<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
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
}
