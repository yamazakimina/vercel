<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl leading-tight mr-4">
                <a href="{{ route('vtuber.index') }}" class="{{ request()->is('vtuber*') ? 'text-blue-500' : 'text-gray-800 dark:text-gray-200' }}">{{ __('Vtuber一覧') }}</a>
            </h2>
            <h2 class="font-semibold text-xl leading-tight">
                <a href="{{ route('fan-certificates.index') }}" class="{{ request()->is('fan-certificates*') ? 'text-blue-500' : 'text-gray-800 dark:text-gray-200' }}">{{ __('ファンカード一覧') }}</a>
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @foreach ($certificates as $certificate)
                <div class="mb-6">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
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

                        <div class="flex justify-center">
                            <a href="{{ route('fan-certificates.show', ['id' => $certificate->id]) }}">
                                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">詳細を見る</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>