<div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-200">
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <div class="mb-4 sm:mb-0">
            <h2 class="text-2xl font-bold text-gray-800 mb-1">
                {{ $exam }}
            </h2>
            <div class="flex items-center gap-2">
                <span class="text-gray-500 text-sm font-medium">Ujian Sertifikasi</span>
                <span class="text-gray-400">•</span>
                <span class="text-sm font-medium text-blue-600">Soal {{ $questions->currentPage() }} dari {{ $totalQuestions }}</span>
            </div>
        </div>

        <!-- Timer -->
        <div wire:poll.1000ms="decrementTime" class="bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-semibold shadow-sm flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            <span>{{ gmdate('i:s', $timeLeft) }}</span>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="mt-6">
        <div class="flex justify-between text-sm text-gray-600 mb-2">
            <span>Progress: {{ $answeredQuestions }}/{{ $totalQuestions }} terjawab</span>
            <span>{{ round(($answeredQuestions / $totalQuestions) * 100) }}%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5 overflow-hidden">
            <div class="bg-gradient-to-r from-green-400 to-green-600 h-2.5 rounded-full transition-all duration-500"
                style="width: {{ ($answeredQuestions / $totalQuestions) * 100 }}%"></div>
        </div>
    </div>
</div>
