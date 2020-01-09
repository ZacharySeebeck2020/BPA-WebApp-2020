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
