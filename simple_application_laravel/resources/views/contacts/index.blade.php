<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('お問い合わせ一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('contacts.create') }}" class="text-blue-500">新規登録</a>
                    <div class="flex flex-col text-center w-full mb-10">
                        <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-800 dark:text-gray-200">問い合わせ一覧</h1>
                    </div>
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">NAME</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">TITLE</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">CREATED_AT</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">DETAIL</th>
                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                        <tr class="border-b-2 border-gray-200">
                            <td class="px-4 py-3">{{ $contact->id }}</td>
                            <td class="px-4 py-3">{{ $contact->name }}</td>
                            <td class="px-4 py-3">{{ $contact->title }}</td>
                            <td class="px-4 py-3 text-lg">{{ $contact->created_at }}</td>
                            <td class="px-4 py-3 text-lg">
                                <a href="{{ route('contacts.show',['id' => $contact->id]) }}" class="text-blue-500">Move</a>
                            </td>
                            <td class="w-10 text-center">
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
