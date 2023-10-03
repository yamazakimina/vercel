<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ファン証明書の更新') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <form method="POST" action="{{ route('fan-certificates.update', [ 'id' => $certificate->id ]) }}">
                @method('PUT')
                @csrf
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="fan_name" class="leading-7 text-sm text-gray-600">ファンネーム</label>
                        <input type="text" id="fan_name" name="fan_name" value="{{ $certificate->fan_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="likes" class="leading-7 text-sm text-gray-600">推しの好きなところ</label>
                        <input type="text" id="likes" name="likes" value="{{ $certificate->likes }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="support_comment" class="leading-7 text-sm text-gray-600">応援コメント</label>
                        <textarea id="support_comment" name="support_comment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required>{{ $certificate->support_comment }}</textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">会員証を発行する</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
