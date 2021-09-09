<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('settings.update', 1) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="order_email" class="block font-medium text-sm text-gray-700">{{ __('Order Emails') }}</label>
                            @foreach($settings['order_email'] as $order_email)
                            <input type="text" name="order_email[]" id="order_email_{{ $loop->index }}" type="text" class="w-3/4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   value="{{ old('order_email.'.$loop->index, $order_email) }}" placeholder="{{ __('Email') }}" />
                                @error('order_email.'.$loop->index)
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            @endforeach
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="phone" class="block font-medium text-sm text-gray-700">{{ __('Phone') }}</label>
                            <input type="text" name="phone" id="phone" type="text" class="w-3/4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   value="{{ old('phone', $settings['phone']) }}" placeholder="{{ __('Phone') }}" />
                            @error('phone')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="email" class="block font-medium text-sm text-gray-700">{{ __('Email') }}</label>
                            <input type="text" name="email" id="email" type="text" class="w-3/4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   value="{{ old('email', $settings['email']) }}" placeholder="{{ __('Email') }}" />
                            @error('email')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="address" class="block font-medium text-sm text-gray-700">{{ __('Address') }}</label>
                            <input type="text" name="address" id="address" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   value="{{ old('address', $settings['address']) }}" placeholder="{{ __('Address') }}" />
                            @error('address')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="title" class="block font-medium text-sm text-gray-700">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   value="{{ old('title', $settings['title']) }}" placeholder="{{ __('Title') }}" />
                            @error('title')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
                            <textarea rows="3" type="text" name="description" id="description" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   placeholder="{{ __('Description') }}">{{ old('description', $settings['description']) }}</textarea>
                            @error('description')
                                <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 pb-4 bg-white sm:p-6 sm:pt-0">
                            <label for="keywords" class="block font-medium text-sm text-gray-700">{{ __('Keywords') }}</label>
                            <input type="text" name="keywords" id="keywords" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-3 block w-full"
                                   value="{{ old('keywords', $settings['keywords']) }}" placeholder="{{ __('Keywords') }}" />
                            @error('keywords')
                            <p class="pt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
