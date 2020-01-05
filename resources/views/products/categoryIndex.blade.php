@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="p-8 flex flex-row">
    <div class="w-1/2">
        <h1 class="text-3xl my-auto text-gray-700 ml-5"> <i class="fas fa-shopping-bag text-blue-600 mr-2"></i></i> All Products In {{ $category->name }}</h1>
    </div>
    <div class="w-1/2 text-right">

    </div>
</div>

<div class="flex">
    <div class="w-3/12 pl-5 p-5 rounded-r-lg border-r-2 border-gray-500">
        <h1 class="text-xl text-gray-700 pt-5 font-bold mb-3">Search By Category</h1>
        <ul>
            <li><a class="text-lg text-gray-600 my-2" href="{{ route('products.index') }}">All Products</a></li>
            @foreach ($categories as $category_b)
                <li><a class="text-lg text-gray-600 my-2 {{ $category_b->name == $category->name ? 'font-bold' : ''}}" href="{{ route('products.category.view', $category_b->slug) }}">{{ $category_b->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="w-9/12 p-5">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <a href="{{ route('products.view', $product->slug) }}">
                    <div class="w-full py-2 my-1 flex border-b-2 rounded-b-sm border-gray-400">
                        <img src="{{ asset('/img/tshirt.jpg') }}" class="mx-2 h-32 w-32 shadow-lg rounded">
                        <div class="mx-1 ml-3 w-full h-30 rounded-sm">
                            <div class="h-1/4 text-gray-600 text-2xl">
                                {{ $product->name }} <span class="text-gray-300 text-base ml-1">({{ $product->category->name }})</span>
                            </div>
                            <div class="h-1/4 text-gray-500 text-sm">
                                ${{ $product->price }}
                            </div>
                            <div class="h-2/4 pt-2 text-gray-700 text-lg">
                                {{ $product->short_description }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="w-full py-2 my-1">
                <h2 class="text-gray-700 text-2xl text-center">No Products Found</h2>
            </div>
        @endif

    </div>
</div>
@endsection

@section('scripts')

@endsection
