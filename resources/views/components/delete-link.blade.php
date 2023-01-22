<a {{ $attributes->merge(['data-confirm' => __('views.confirm'), 'data-method' => 'delete', 'class' => 'text-red-600 hover:text-red-900']) }}>
    {{ $slot }}
</a>
