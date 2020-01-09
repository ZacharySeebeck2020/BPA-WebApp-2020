@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="p-8 flex flex-row">
    <div class="w-1/2">
        <h1 class="text-3xl pb-auto-auto text-gray-700 ml-5"> <i class="fas fa-shopping-bag text-green-600 mr-2"></i></i> Checkout</h1>
    </div>
    <div class="w-1/2 text-right">

    </div>
</div>

<div class="flex">
    <div class="w-2/3 p-5">
        <div>
            <h1 class="text-xl text-gray-700 font-bold mb-3">Contact Information</h1>
            <hr class="border-b border-black opacity-25 my-0 py-0" />
            <div class="w-10/12 p-5">
                <div class="flex">
                    <div class="w-4/10">
                        <label class="input_label" for="name_first">First Name<span class="required">*</span></label>
                        <input class="input_field" name="name_first" type="text" required value="{{ old('name_first') }}" placeholder="John">
                    </div>
                    <div class="w-2/210"></div>
                    <div class="w-4/10">
                        <label class="input_label" for="name_last">Last Name<span class="required">*</span></label>
                        <input class="input_field" name="name_last" type="text" required value="{{ old('name_last') }}" placeholder="Doe">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h1 class="text-xl text-gray-700 font-bold mb-3">Billing/Shipping Information</h1>
            <hr class="border-b border-black opacity-25 my-0 py-0" />
            <div class="w-10/12 p-5">

            </div>
        </div>

        <div>
            <h1 class="text-xl text-gray-700 font-bold mb-3">Payment Information</h1>
            <hr class="border-b border-black opacity-25 my-0 py-0" />
            <div class="w-10/12 p-5">

            </div>
        </div>
    </div>
    <div class="w-1/3 pl-5 p-5 rounded-r-lg border-l-2 border-gray-500">
        <h1 class="text-xl text-gray-700  font-bold mb-3 text-center">Your Cart</h1>
        <hr class="border-b border-black opacity-25 my-0 py-0" />
        @foreach ($cart->products as $product)
            <a href="{{ route('products.view', $product->slug) }}">
                <div class="w-3/4 mx-auto py-2 mb-10 my-1 flex border-b-2 rounded-b-sm border-gray-400">
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
@endsection

@section('scripts')

@endsection
