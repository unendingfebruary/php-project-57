<a {{ $attributes->merge(['data-confirm' => 'Вы уверены?', 'data-method' => 'delete', 'class' => 'text-red-600 hover:text-red-900']) }}>
    {{ $slot }}
</a>
