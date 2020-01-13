@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="pt-2 pb-8 mt-4">
    <div class="w-full text-center">
        <h1 class="text-3xl text-gray-700">Thank you for your order!</h1>
    </div>

    <div class="w-full text-center pt-4">
        <h2 class="text-xl text-gray-500">Please check the email you provided for more information, including shipping of your new order.</h2>
        <a href="{{ route('products.index') }}" class="button button_gray mt-5">Continue Shopping</a>
    </div>
</div>
@endsection

@section('scripts')

@endsection
