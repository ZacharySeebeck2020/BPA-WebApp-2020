@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="p-8 flex md:flex-row flex-col">
    <div class="w-full md:w-1/2">
        <h1 class="text-3xl my-auto text-gray-700 ml-5"> <i class="fas fa-search text-blue-600 mr-2"></i></i> Search Results ({{ $query}})</h1>
    </div>
    <div class="w-full md:w-1/2 flex md:mt-0 mt-3">
        <form action="{{ route('products.search') }}" method="POST" class="flex ml-auto">
            @csrf
            <input class="input_field" value="{{ $query }}" name="query" type="text" required placeholder="Search...">
            <button type="submit" class="button ml-2 button_gray text-sm my-auto">Search</button>
        </form>
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
                <h2 class="text-gray-700 text-2xl text-center">No Products Found With That Search Term</h2>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')

@endsection
