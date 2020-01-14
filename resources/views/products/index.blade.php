@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="p-8 flex flex-row">
    <div class="w-full">
        <h1 class="text-3xl my-auto text-gray-700 ml-5"> <i class="fas fa-shopping-bag text-blue-600 mr-2"></i></i> All Products</h1>
    </div>
</div>

<div class="flex md:flex-row flex-col">
    <div class="md:w-3/12 w-full pl-5 p-5 rounded-r-lg border-r-2 border-none md:border-gray-500">
        <h1 class="text-xl text-gray-700 pt-5 font-bold mb-3">Search By Category</h1>
        <ul>
            <li><a class="text-lg text-gray-600 my-2 font-bold" href="{{ route('products.index') }}">All Products</a></li>
            @foreach ($categories as $category)
                <li><a class="text-lg text-gray-600 my-2" href="{{ route('products.category.view', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="md:w-9/12 w-full p-5">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                @include('products.components.product')
            @endforeach
        @else
            <div class="w-full py-2 my-1">
                <h2 class="text-gray-700 text-2xl text-center">No Products Found</h2>
            </div>
        @endif

        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
