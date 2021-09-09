<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('title', '') }}" />
                            @error('title')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
                            <input type="text" name="description" id="description" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('description', '') }}" />
                            @error('description')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0 flex flex-wrap gap-4">
                            <div class="w-48">
                                <label for="price" class="block font-medium text-sm text-gray-700">{{ __('Price') }}</label>
                                <input type="text" name="price" id="price" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-48"
                                       value="{{ old('price', '') }}" />
                                @error('price')
                                    <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-48">
                                <label for="position" class="block font-medium text-sm text-gray-700">{{ __('Position (in the list)') }}</label>
                                <input type="text" name="position" id="position" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-48"
                                       value="{{ old('position', '100') }}" placeholder="100" />
                                @error('position')
                                    <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-48">
                                <label for="quantity" class="block font-medium text-sm text-gray-700">{{ __('Quantity') }}</label>
                                <input type="text" name="quantity" id="quantity" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-48"
                                       value="{{ old('quantity', '10') }}" placeholder="10" />
                                @error('quantity')
                                    <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="category_id" class="block font-medium text-sm text-gray-700">{{ __('Category') }}</label>
                            <select name="category_id" id="category_id" class="w-3/4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block rounded-md shadow-sm mt-1 block w-full">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id') == $category->id ? "selected" : "") }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0 flex flex-wrap gap-4">
                            <div class="">
                                <label for="image" class="block font-medium text-sm text-gray-700">{{ __('Image') }}</label>
                                <select name="image" id="image" style="background-image: none !important;" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block rounded-md shadow-sm mt-1 block w-full" size="7">
                                    @foreach(Storage::disk('products')->files('1600x1064') as $filename)
                                        <option value="{{ basename($filename) }}" {{ (old("image") == basename($filename) ? "selected" : "") }}>{{ basename($filename) }}</option>
                                    @endforeach
                                </select>
                                @error('image')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="pt-1">
                                <img id="preview" class="pt-6 h-48" src="{{ (old('image') ? Storage::disk('products')->url('224x149').'/'.old('image') : '/public/static/images/productImageDefault.jpg') }}" />
                                <script>
                                    document.getElementById('image').onchange = function(){
                                        document.getElementById('preview').src =
                                            '{{ Storage::disk('products')->url('224x149') }}/' + this.value;
                                    };
                                </script>
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
