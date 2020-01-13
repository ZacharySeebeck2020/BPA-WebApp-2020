@extends('layouts.landing')

@section('styles')

@endsection

@section('content')
<h1 class="text-center text-black text-3xl">Featured Products</h1>
<div class="mt-4 flex">
    @foreach ($products as $product)
        <div class="content_card w-1/4 shadow-lg m-2 shadow-lg">
            <h3 class="text-center text-gray-800 text-xl">{{ $product->name }}</h3>
            @if (isset($product->image))
                <img src="{{ $product->image }}" class="mx-2 h-64 w-64 shadow-lg rounded mx-auto my-3">
            @else
                <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 h-32 w-32 shadow-lg rounded mx-auto my-3">
            @endif

            <div class="w-full text-center">
                <a href="{{ route('products.view', $product->slug)}}" class="button text-sm my-auto" style="background-color: #6877a7;">View Product</a>

                <form action="{{ route('cart.add', $product->slug) }}" method="POST" class="">
                    @csrf
                    <button type="submit" class="button button_gray text-sm my-auto mt-3">Add To Cart</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('scripts')

@endsection
