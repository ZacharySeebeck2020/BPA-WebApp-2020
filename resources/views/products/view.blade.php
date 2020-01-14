@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="">
    <div class="w-full text-left">
        <a href="{{ route('products.index') }}" class="text-gray-400 text-sm">< Back To Products Page</a>
    </div>
</div>

<div class="p-8 flex md:flex-row flex-col mt-4">
    <div class="md:w-1/2 w-full">
        @if (isset($product->image))
            <img src="{{ $product->image }}" class="mx-auto w-3/4 shadow-lg rounded-lg">
        @else
            <img src="{{ asset('/img/image-soon.png') }}" class="mx-auto w-3/4 shadow-lg rounded-lg">
        @endif
    </div>

    <div class="md:w-1/2 w-full text-left">
        <h2 class="text-gray-700 text-4xl pt-3 md:text-left text-center">{{ $product->name }}</h2>
        <h2 class="text-gray-800 text-xl pt-2 md:text-left text-center">${{ $product->price }}</h2>

        <div class="mt-3 text-gray-600 text-lg md:text-left text-center">
            {!! $product->description !!}
        </div>

        <div class="mt-10 text-gray-600 text-lg w-full md:text-left text-center">
            <form action="{{ route('cart.add', $product->slug) }}" method="POST">
                @csrf
                <button type="submit" class="button button_gray">Add To Cart</button>
            </form>
        </div>
    </div>
</div>

@if (!empty($product->details)))
<div class="md:px-32 px-10 text-left">
    <h2 class="text-gray-700 text-2xl pt-3">Details</h2>
    <div class="mt-3 text-gray-600 text-lg">
        {!! $product->details !!}
    </div>
</div>
@endif

@endsection

@section('scripts')

@endsection
