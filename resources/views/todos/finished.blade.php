<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            完了済みTODO一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container px-5 py-12 mx-auto">
                        <div class="-my-8 divide-y-2 divide-gray-100">
                        @foreach ($todos as $todo)
                            <a href="{{ route('todos.edit', ['todo' => $todo->id]) }}" class="py-8 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-40 md:mb-0 mr-6 mb-6 flex-shrink-0 flex flex-col">
                                    @if ($todo->is_finished)
                                        <span class="text-center text-white bg-indigo-500 border-0 py-2 px-8 rounded text-lg">完了</span>
                                    @else
                                        <span class="text-center text-white bg-red-400 border-0 py-2 px-8 rounded text-lg">未完了</span>
                                    @endif
                                    <div class="flex">
                                        <span class="text-xl font-medium text-gray-900 title-font mb-2">期限：</span>
                                        <span class="text-xl font-medium text-gray-900 title-font mb-2">{{ $todo->deadline->format('Y/m/d') }}</span>
                                    </div>
                                </div>
                                <div class="md:flex-grow">
                                    <span class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $todo->title }}</span>
                                </div>

                            </a>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
