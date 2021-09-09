<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Product') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('products.index') }}" class="ml-3 sm:ml-0 bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">{{ __('Back to list') }}</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('ID') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Title') }}
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->title }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Description') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->description }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Image') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        @if($product->image)
                                            <div class="flex flex-wrap gap-4">
                                                <div>
                                                    <a href="{{ Storage::disk('products')->url('1600x1064') }}/{{ $product->image }}" target="_blank">
                                                        <img class="w-60" src="{{ Storage::disk('products')->url('1600x1064') }}/{{ $product->image }}" />
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ Storage::disk('products')->url('600x399') }}/{{ $product->image }}" target="_blank">
                                                        <img class="w-48" src="{{ Storage::disk('products')->url('600x399') }}/{{ $product->image }}" />
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ Storage::disk('products')->url('224x149') }}/{{ $product->image }}" target="_blank">
                                                        <img class="w-20" src="{{ Storage::disk('products')->url('224x149') }}/{{ $product->image }}" />
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <img class="w-60" src="/public/static/images/productImageDefault.jpg" />
                                        @endif
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Price') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->price }} руб.
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Category') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->category->name }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Position (in the list)') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->position }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Quantity') }}
                                    </th>
                                    <td class="px-6 py-4 text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $product->quantity }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block mt-8">
                <a href="{{ route('products.index') }}" class="ml-3 sm:ml-0 bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">{{ __('Back to list') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
