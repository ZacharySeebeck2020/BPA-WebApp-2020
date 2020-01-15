@extends('layouts.app')

@section('style')
    <meta http-equiv="Refresh" content="15; url={{ route('products.index') }}" />
@endsection

@section('content')
    <div class="flex items-center">
        <div class="w-full p-6">
            <h2 class="text-gray-900 text-center text-2xl">Welcome to Epic Win Sporting Goods!</h2>

            <div class="w-full text-center pt-4">
                <h2 class="text-xl text-gray-700">We're glad to have you here!</h2>
                <a href="{{ route('products.index') }}" class="button button_gray text-white-400 mt-5">Start Shopping</a>
            </div>
        </div>
    </div>
@endsection
