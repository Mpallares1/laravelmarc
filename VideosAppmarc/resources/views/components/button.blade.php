<button
    {{ $attributes->merge(['class' => "px-4 py-2 font-bold text-white rounded-md transition-all duration-300 $color"]) }}>
    {{ $slot }}
</button>
