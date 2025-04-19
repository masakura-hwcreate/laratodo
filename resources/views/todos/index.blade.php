<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            TODO一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end mb-4">
                    <button onclick="location.href='{{ route('todos.create') }}'" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">新規登録する</button>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="-my-8 divide-y-2 divide-gray-100">
                        @foreach ($todos as $todo)
                            <div class="py-8 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                    <span class="font-semibold title-font text-gray-700">{{ $todo->is_finished}}</span>
                                    <span class="mt-1 text-gray-500 text-sm">{{ $todo->deadline->format('Y-m-d') }}</span>
                                </div>
                                <div class="md:flex-grow">
                                    <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}" class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $todo->title }}</a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
