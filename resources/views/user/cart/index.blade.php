@extends('layouts.app')

@section('styles')

@endsection

@section('content')
@if ($cart->productCount() > 0)
<div class="">
    <div class="w-1/2 text-left">
        <a href="{{ route('products.index') }}" class="text-gray-400 text-sm">< Continue Shopping</a>
    </div>
</div>
@endif

<div class="pt-2 pb-8 mt-4">
    <div class="w-full text-center">
        <h1 class="text-3xl text-gray-700">Your Cart</h1>
    </div>

    @if ($cart->productCount() == 0)
        <div class="w-full text-center pt-4">
            <h2 class="text-xl text-gray-500">No items in your cart!</h2>
            <a href="{{ route('products.index') }}" class="button button_gray mt-5">Continue Shopping</a>
        </div>
    @else


        @foreach ($cart->products as $product)
            <a href="{{ route('products.view', $product->slug) }}">
                <div class="w-3/4 mx-auto py-2 mb-10 my-1 flex border-b-2 rounded-b-sm border-gray-400">
                    @if (isset($product->image))
                        <img src="{{ $product->image }}" class="mx-2 mb-2 h-16 w-16 shadow-lg rounded">
                    @else
                        <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 mb-2 h-16 w-16 shadow-lg rounded">
                    @endif
                    <div class="mx-1 ml-3 w-full h-30 rounded-sm">
                        <div class="h-1/4 text-gray-800 text-2xl flex">
                            {{ $product->name }} <span class="text-gray-600 font-bold text-base ml-1">({{ $product->pivot->count }})</span>
                            <form action="{{ route('cart.remove', $product->id) }}" method="POST" class="ml-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button_sm button_red text-sm my-auto">Remove One From Cart</button>
                            </form>
                        </div>
                        <div class="h-1/4 text-gray-500 text-sm">
                            ${{ $product->price }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="mt-5 w-full content-right flex">
            <h2 class="text-xl text-gray-500 ml-auto">Ready to checkout?</h2>
            <form action="{{ route('order.start') }}" method="GET">
                <button type="submit" class="button_sm button_green ml-3">Checkout</button>
            </form>
        </div>
    @endif

</div>

@if ($cart->productCount() > 0)
<div class="">
    <div class="w-1/2 text-left">
        <a href="{{ route('products.index') }}" class="text-gray-400 text-sm">< Continue Shopping</a>
    </div>
</div>
@endif

@endsection

@section('scripts')

@endsection
