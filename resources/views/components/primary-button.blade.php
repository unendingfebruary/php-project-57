<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4']) }}>
    {{ $slot }}
</button>
