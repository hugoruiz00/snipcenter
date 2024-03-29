<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Vote;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $tags = Tag::all();

        return view('posts.create', compact('post', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->tags = $this->createAndGetTags($request);
        $request['user_id'] = auth()->id();
        $request['post_status_id'] = 1;
        $post = Post::create($request->all());
        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    private function createAndGetTags($request)
    {
        $tags = [];
        foreach ($request->tags as $tag) {
            if (str_contains($tag, ':')) {
                $tagName = explode(':', $tag)[1];
                $tag = Tag::firstOrCreate([
                    'name' => $tagName,
                ]);
                $tags[] = $tag->id;
            } else {
                $tags[] = $tag;
            }
        }

        return $tags;
    }

    public function upVote(Post $post){
        $vote = Vote::where('user_id', auth()->id())->where('post_id', $post->id)->first();
        if($vote){
            if($vote->vote === 1){
                $vote->delete();
                $post->vote = $post->vote - 1;
            } elseif($vote->vote === -1){
                $vote->update(['vote' => 1]);
                $post->vote = $post->vote + 2;
            }
        } else{
            Vote::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'vote' => 1
            ]);
            $post->vote = $post->vote + 1;
        }
        $post->update();

        return redirect()->route('posts.show', $post);
    }

    public function downVote(Post $post){
        $vote = Vote::where('user_id', auth()->id())->where('post_id', $post->id)->first();
        if($vote){
            if($vote->vote === -1){
                $vote->delete();
                $post->vote = $post->vote + 1;
            } elseif($vote->vote === 1){
                $vote->update(['vote' => -1]);
                $post->vote = $post->vote - 2;
            }
        } else{
            Vote::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'vote' => -1
            ]);
            $post->vote = $post->vote - 1;
        }
        $post->update();

        return redirect()->route('posts.show', $post);
    }

    public function tagPosts(Tag $tag){
        $posts = $tag->posts;

        return view('posts.tagPosts', compact('posts', 'tag'));
    }
}
