@extends('layouts.admin.app')

@section('title', 'Administration Dashboard')

@section('style')

@endsection

@section('content')
    <div class="content_card w-full my-2">
        <h1 class="text-2xl text-gray-700">Order Information</h1>
        <hr class="w-full border-b-2 border-blue-500">
        <h2 class="text-xl text-gray-600 my-2 mt-5">Open: <span class="text-bold">{{ App\Order::getOrderCountByStatus('OPEN')}}</span></h2>
        <h2 class="text-xl text-gray-600 my-2">Ready: <span class="text-bold">{{ App\Order::getOrderCountByStatus('READY')}}</span></h2>
        <h2 class="text-xl text-gray-600 my-2">Shipped: <span class="text-bold">{{ App\Order::getOrderCountByStatus('SHIPPED')}}</span></h2>
        <h2 class="text-xl text-gray-600 my-2">Delivered: <span class="text-bold">{{ App\Order::getOrderCountByStatus('DELIVERED')}}</span></h2>
        <h2 class="text-xl text-gray-600 my-2">Closed: <span class="text-bold">{{ App\Order::getOrderCountByStatus('CLOSED')}}</span></h2>
    </div>

    <div class="content_card w-full my-2">
        <h1 class="text-2xl text-gray-700">Product Information</h1>
        <hr class="w-full border-b-2 border-green-500">
        <h2 class="text-xl text-gray-600 my-2 mt-5">Total Number: <span class="text-bold">{{ App\Product::all()->count()}}</span></h2>
        <h2 class="text-xl text-gray-600 my-2">Featured: <span class="text-bold">{{ App\Product::where('featured', true)->get()->count()}}</span></h2>
    </div>
@endsection

@section('scripts')

@endsection
