<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                            <input type="text" name="name" id="name" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="code" class="block font-medium text-sm text-gray-700">{{ __('Code') }}</label>
                            <input type="text" name="code" id="code" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('code', '') }}" />
                            @error('code')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0 flex flex-wrap gap-4">
                            <div class="w-48">
                                <label for="position" class="block font-medium text-sm text-gray-700">{{ __('Position (in the list)') }}</label>
                                <input type="text" name="position" id="position" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-48"
                                       value="{{ old('position', '10') }}" placeholder="10" />
                                @error('position')
                                    <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
