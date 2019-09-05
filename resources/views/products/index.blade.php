@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex flex-row">
            @foreach($products as $product)
                <store-card category="Water Bottles" title="{{ isset($product->short_title) ? $product->short_title : $product->title }}" price="{{ $product->price }}" img_url="https://www.hydroflask.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/h/y/hydro_flask_32oz_wide_mouth_vacuum_insulated_stainless_steel_water_bottle_-_lava-min_1.png"></store-card>
            @endforeach`
        </div>
    </div>
@endsection
