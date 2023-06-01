<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
        <x-link-button href="{{ route('categories.create') }}">{{ __('New Category') }}</x-link-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap mb-5">
                        <thead>
                            <tr class="text-center font-bold">
                                <th class="border px-6 py-4">{{ __('Name') }}</th>
                                <th class="border px-6 py-4">{{ __('Parent') }}</th>
                                <th class="border px-6 py-4 w-10">{{ __('Actions') }}</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($categories as $category)
                                <tr class="text-center">
                                    <td class="border px-6 py-4">{{ $category->name }}</td>
                                    <td class="border px-6 py-4">{{ optional($category->parent)->name }}</td>
                                    <td class="border px-6 py-4 w-10">

                                        <a href="{{ route('categories.edit', $category->id ) }}">{{ __('Edit') }}</a>


                                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                    
                                                <x-danger-button class="mt-4">
                                                    {{ __('Delete') }}
                                                </x-danger-button>

                                            </div>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>


                    </table>


                    {{ $categories->links() }}



     
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>