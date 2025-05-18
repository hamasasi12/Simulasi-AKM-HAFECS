<tr>
    <td colspan="{{ $colspan }}" class="px-4 py-8">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="bg-gray-100 rounded-full p-6 mb-4">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-700 mb-1">{{ $title }}</h3>
            <p class="text-gray-500 mb-4">{{ $message }}</p>
            
            @if($showButton && $buttonText && $buttonLink)
            <a href="{{ $buttonLink }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
                {{ $buttonText }}
            </a>
            @endif
        </div>
    </td>
</tr>