<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#1C6FAC] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#0093FF] active:bg-[#0093FF] focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
