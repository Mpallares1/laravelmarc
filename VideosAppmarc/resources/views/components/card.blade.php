<div class="bg-[#1a1a2e] text-white rounded-lg shadow-xl p-4 space-y-2 transition-transform transform hover:scale-105 hover:shadow-lg">
    <h3 class="text-lg font-bold">{{ $title }}</h3>
    <p class="text-sm text-gray-400">{{ $description }}</p>
    <div class="flex justify-end">
        {{ $slot }}
    </div>
</div>
