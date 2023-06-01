<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <!-- Parent Category -->
                        <div class="mt-3">
                            <x-input-label for="name" :value="__('Parent')" />
                            <select id="parent_id" class="block mt-1 w-full" name="parent_id">
                                <option value="">{{ __('None') }}</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" @selected( $item->id == old('parent_id', $category->parent_id) )>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                
                            <x-primary-button class="mt-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>





     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>