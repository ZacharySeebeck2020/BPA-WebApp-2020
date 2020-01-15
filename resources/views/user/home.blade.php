@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="w-full p-6">
            <h2 class="text-gray-900 text-center text-2xl">Your Orders</h2>
            @if ($orders->count() > 0)
                @foreach ($orders as $order)
                    <div class="content_card mt-3">
                        <div class="flex">
                            <div class="w-full text-gray-700">
                                Order ID: <span class="font-bold">{{ $order->id }}</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-1/2 text-gray-700">
                                Status: <span class="font-bold">{{ $order->status }}</span>
                            </div>
                            <div class="w-1/2 text-gray-700 text-right">
                                Placed On: <span class="font-bold">{{ $order->created_at }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
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
                        </div>
                    </div>
                @endforeach
            @else
                <div class="w-full text-center pt-4">
                    <h2 class="text-xl text-gray-500">No previous orders!</h2>
                    <a href="{{ route('products.index') }}" class="button button_gray mt-5">Start Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
