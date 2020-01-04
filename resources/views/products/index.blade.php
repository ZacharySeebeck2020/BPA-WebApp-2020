@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="p-8 flex flex-row">
    <div class="w-1/2">
        <h1 class="text-3xl my-auto text-gray-700 ml-5"> <i class="fas fa-shopping-bag text-blue-600 mr-2"></i></i> All Products</h1>
    </div>
    <div class="w-1/2 text-right">

    </div>
</div>

<div class="flex">
    <div class="w-3/12 pl-5 p-5 rounded-r-lg border-r-2 border-gray-500">
        <h1 class="text-xl text-gray-700 pt-5 font-bold mb-3">Search By Category</h1>
        <ul>
            @foreach ($categories as $category)
                <li><a class="text-lg text-gray-600 my-2" href="#">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="w-9/12 p-5">
        <div class="w-full py-2 my-2 bg-gray-400 flex">
            <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 h-40 w-40">
            <div class="mx-1 w-full h-40 rounded-sm">

            </div>
        </div>

        <div class="w-full py-2 my-2 bg-gray-400 flex">
            <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 h-40 w-40">
            <div class="mx-1 w-full h-40 rounded-sm">

            </div>
        </div>

        <div class="w-full py-2 my-2 bg-gray-400 flex">
            <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 h-40 w-40">
            <div class="mx-1 w-full h-40 rounded-sm">

            </div>
        </div>

        <div class="w-full py-2 my-2 bg-gray-400 flex">
            <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 h-40 w-40">
            <div class="mx-1 w-full h-40 rounded-sm">

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
