@php
    $products = App\Models\Product::all();
    $categories = App\Models\Category::all();
    $totalCost = 0;
@endphp

@component('mail::message')
<h1>{{ __('New Order') }}</h1>

@component('mail::panel')
<h2>{{ __('Client') }}:</h2>
@if($orderData['name']){{ __('Name') }}: {{ $orderData['name'] }}<br>{{ PHP_EOL }}@endif
@if($orderData['surname']){{ __('Surname') }}: {{ $orderData['surname'] }}<br>{{ PHP_EOL }}@endif
@if($orderData['email']){{ __('Email') }}: <a href="mailto:{{ $orderData['email'] }}">{{ $orderData['email'] }}</a><br>{{ PHP_EOL }}@endif
@if($orderData['phone']){{ __('Phone') }}: <a href="callto:{{ $orderData['phone'] }}">{{ $orderData['phone'] }}</a><br>{{ PHP_EOL }}@endif
@endcomponent

@if($orderData['address'])
@component('mail::panel')
<h2>{{ __('Client`s Address') }}:</h2>
@foreach($orderData['address'] as $key => $value){{ __($key) }}: {{ $value }}<br>{{ PHP_EOL }}@endforeach
@endcomponent
@endif

@if($orderData['comment'])
@component('mail::panel')
<h2>{{ __('Client`s Comment') }}:</h2>
{{ $orderData['comment'] }}<br>{{ PHP_EOL }}
@endcomponent
@endif

@component('mail::panel')
<h2>{{ __('Order') }}:</h2>
@forelse($orderData['items'] as $item)
@php
    $product = $products->find($item['product']);
    $category = $categories->find($product->category_id);
@endphp
@if($category->name){{ __('Category') }}: {{ $category->name }}<br>{{ PHP_EOL }}@endif
@if($product->title){{ __('Title') }}: {{ $product->title }}<br>{{ PHP_EOL }}@endif
@if($item['quantity']){{ __('Quantity') }}: {{ $item['quantity'] }}<br>{{ PHP_EOL }}@endif
@if($item['quantity'] and $product->price)
@php
    $cost = $item['quantity']*$product->price;
    $totalCost += $cost;
@endphp
{{ __('Cost') }}: {{ $product->price }} * {{ $item['quantity'] }} = {{ $cost }} ₽<br>{{ PHP_EOL }}@endif
<hr>
@empty
<b>{{ __('No products selected!') }}</b>
@endforelse
<br>{{ __('Total Cost') }}: <b>{{ $totalCost }}</b> ₽
@endcomponent

{{ config('app.name') }}
@endcomponent
