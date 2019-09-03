@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="text-center">All Products</h1>

        <div class="row">
            <sellable :img_url="'https://www.dunhamssports.com/wp-content/uploads/2019/08/898_Techshell-Jacket.jpg'" :title="'Habit Techshell Coat And Pant'" :price="'59.99'"></sellable>
        </div>

    </div>

@endsection
