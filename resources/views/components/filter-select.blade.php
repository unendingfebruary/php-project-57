<select {{ $attributes->merge(['class' => 'rounded border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50']) }}>
    {{ $slot }}
</select>
