<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ファン証明書の表示') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <div class="mb-4">
                    <label for="fan_name" class="block text-sm text-gray-600">ファンネーム</label>
                    <div class="mt-1 text-lg font-semibold">{{ $certificate->fan_name }}</div>
                </div>
    
                <div class="mb-4">
                    <label for="likes" class="block text-sm text-gray-600">推しの好きなところ</label>
                    <div class="mt-1 text-lg font-semibold">{{ $certificate->likes }}</div>
                </div>
    
                <div class="mb-4">
                    <label for="support_comment" class="block text-sm text-gray-600">応援コメント</label>
                    <div class="mt-1 text-lg font-semibold">{{ $certificate->support_comment }}</div>
                </div>
                    
                <div class="mb-4">
                    <label for="support_comment" class="block text-sm text-gray-600">作成日</label>
                    <div class="mt-1 text-lg font-semibold">{{ $certificate->created_at }}</div>
                </div>
            </div>
    
            <div class="flex justify-center">
                <a href="{{ route('fan-certificates.edit', [ 'id' => $certificate->id ]) }}">
                    <button class="inline-flex items-center justify-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                        ファン証明書を更新する
                    </button>
                </a>
            </div>
        </div>
    </div>    

</x-app-layout>
