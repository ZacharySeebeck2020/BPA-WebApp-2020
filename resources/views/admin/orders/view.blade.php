@extends('layouts.admin.app')

@section('title', 'Administration - Single Order')

@section('style')

@endsection

@section('content')
<div class="p-8 pb-0 flex flex-row">
    <div class="w-1/3">
        <h1 class="text-3xl my-auto"> <i class="fas fa-archive text-blue-500"></i></i> Order #{{ $order->id }}</h1>
    </div>
</div>
<div class="pb-8 pt-2 flex lg:flex-row flex-col">
    <div class="w-1/2 flex flex-row">
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="w-full flex flex-row">
            @csrf
            <h3 class="text-lg my-auto mr-1">Order Status: </h3>
            <select required name="status" class="input_field appearance-none w-1/2 mx-2">
                <option disabled>Select A Status</option>
                <option {{ $order->status == 'OPEN' ? 'selected' : '' }}>Open</option>
                <option {{ $order->status == 'READY' ? 'selected' : '' }}>Ready</option>
                <option {{ $order->status == 'SHIPPED' ? 'selected' : '' }}>Shipped</option>
                <option {{ $order->status == 'DELIVERED' ? 'selected' : '' }}>Delivered</option>
                <option {{ $order->status == 'CLOSED' ? 'selected' : '' }}>Closed</option>
            </select>
            <button type="submit" class="button button_green">Update</button>
        </form>
    </div>

    <div class="w-1/2 flex flex-row lg:pt-0 pt-2">
        <h3 class="text-lg my-auto mr-1">Order Type: </h3>
        <select disabled class="input_field appearance-none w-1/2 mx-2">
            <option disabled>Select A Status</option>
            <option {{ $order->type == 'ONETIME' ? 'selected' : '' }}>One-Time</option>
            <option {{ $order->type == 'USER' ? 'selected' : '' }}>User</option>
        </select>
    </div>
</div>

<div class="content_card">
    <h2 class="text-2xl text-gray-800">Contact Information</h2>
    <div class="flex lg:flex-row flex-col w-full my-2">
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">First Name:</h3>
            <h3 class="text-xl text-gray-600">{{ $contactInformation->first_name}}</h3>
        </div>
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">Last Name:</h3>
            <h3 class="text-xl text-gray-600">{{ $contactInformation->last_name}}</h3>
        </div>
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">Email:</h3>
            <h3 class="text-xl text-gray-600">{{ $contactInformation->email}}</h3>
        </div>
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">Phone:</h3>
            <h3 class="text-xl text-gray-600">{{ $contactInformation->phone}}</h3>
        </div>
    </div>
</div>

<div class="content_card mt-3">
    <h2 class="text-2xl text-gray-800">Shipping Information</h2>
    <div class="flex lg:flex-row flex-col w-full my-2">
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">Address:</h3>
            <h3 class="text-xl text-gray-600">{{ $shippingInformation->address}}</h3>
        </div>
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">Zip:</h3>
            <h3 class="text-xl text-gray-600">{{ $shippingInformation->zip}}</h3>
        </div>
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">City:</h3>
            <h3 class="text-xl text-gray-600">{{ $shippingInformation->city}}</h3>
        </div>
        <div class="w-1/4">
            <h3 class="text-xl text-gray-700">State:</h3>
            <h3 class="text-xl text-gray-600">{{ $shippingInformation->state}}</h3>
        </div>
    </div>
</div>

<div class="content_card my-3">
    <h2 class="text-2xl text-gray-800">Order Products</h2>
    @foreach ($order->products as $product)
        <a href="{{ route('products.view', $product->slug) }}">
            <div class="w-full mx-auto py-2 mb-10 my-1 flex border-b-2 rounded-b-sm border-gray-400">
                @if (isset($product->image))
                    <img src="{{ $product->image }}" class="mx-2 mb-2 h-16 w-16 shadow-lg rounded">
                @else
                    <img src="{{ asset('/img/image-soon.png') }}" class="mx-2 mb-2 h-16 w-16 shadow-lg rounded">
                @endif
                <div class="mx-1 ml-3 w-full h-30 rounded-sm">
                    <div class="h-1/4 text-gray-800 text-2xl flex">
                        {{ $product->name }} <span class="text-gray-600 font-bold text-base ml-1">({{ $product->pivot->count }})</span>
                    </div>
                    <div class="h-1/4 text-gray-500 text-sm">
                        ${{ $product->price }}
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    <div class="mt-5 w-full flex border-t-2 border-gray-600">
        <div class="text-gray-600 text-xl mt-1">
            Total Price: ${{ $order->getCost() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
