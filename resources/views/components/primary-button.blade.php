<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'm-0 inline-flex px-4 py-2 bg-white h-max border border-transparent rounded-md font-semibold text-xs text-gray uppercase tracking-widest  hover:bg-gray-700 hover:text-white focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>