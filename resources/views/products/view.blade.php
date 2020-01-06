@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="">
    <div class="w-1/2 text-left">
        <a href="{{ route('products.index') }}" class="text-gray-400 text-sm">< Back To Products Page</a>
    </div>
</div>

<div class="p-8 flex mt-4">
    <div class="w-1/2">
        <img src="{{ asset('img/tshirt.jpg') }}" class="mx-auto w-3/4 shadow-lg rounded-lg">
    </div>
    <div class="w-1/2 text-left">
        <h2 class="text-gray-800 text-4xl pt-3">{{ $product->name }}</h2>

        <div class="mt-3 text-gray-600 text-lg">
            {!! $product->description !!}
        </div>

        <div class="mt-10 text-gray-600 text-lg">
            <form target="" method="POST">
                <button type="submit" class="button button_gray">Add To Cart</button>
            </form>
        </div>
    </div>
</div>

@if (!empty($product->details)))
<div class="px-32 text-left">
    <h2 class="text-gray-700 text-2xl pt-3">Details</h2>
    <div class="mt-3 text-gray-600 text-lg">
        {!! $product->details !!}
    </div>
</div>
@endif

@endsection

@section('scripts')

@endsection
