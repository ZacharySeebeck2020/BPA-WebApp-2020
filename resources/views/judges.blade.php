@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="mx-10">
    <h1 class="text-left text-gray-900 text-3xl">Welcome BPA Judges!</h1>
    <h2 class="text-gray-800 text-xl">
        Welcome to our project, we're glad to have you here!
    </h2>

    <div class="mt-3 p-4 text-gray-700 text-lg">
        <p>
            The majority of this site, like any e-commerce shop, can be used without an account. But
            for when you need an account, there are two premade accounts for your usage. You can create
            your own account as well if you choose, but you need to use the provided administator account
            to access any of the backend functions.
        </p>
        <div class="flex mt-2">
            <div class="content_card w-1/3 shadow-lg m-4">
                <h3 class="text-gray-900 text-xl w-full text-center">Standard User</h3>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Email Address: </h4>
                    <h4 class="text-gray-700 ml-auto">user@ewsg.cf</h4>
                </div>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Password: </h4>
                    <h4 class="text-gray-700 ml-auto">C0d3D0j0!</h4>
                </div>
            </div>

            <div class="content_card w-1/3 shadow-lg m-4">
                <h3 class="text-gray-800 text-xl w-full text-center">Administrative User</h3>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Email Address: </h4>
                    <h4 class="text-gray-700 ml-auto">admin@ewsg.cf</h4>
                </div>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Password: </h4>
                    <h4 class="text-gray-700 ml-auto">C0d3D0j0!</h4>
                </div>
            </div>

            <div class="content_card w-1/3 shadow-lg m-4">
                <h3 class="text-gray-800 text-xl w-full text-center">cPanel</h3>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Address:</h4>
                    <h4 class="text-gray-700 ml-auto"><a href="https://ewsg.cf/cpanel">https://ewsg.cf/cpanel</a></h4>
                </div>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Username: </h4>
                    <h4 class="text-gray-700 ml-auto">jiixsrkh</h4>
                </div>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Password: </h4>
                    <h4 class="text-gray-700 ml-auto">LA6V%g*%nnUNl7w</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 p-4 text-gray-700 text-lg">
        <p>
            Past the user accounts, there's nothing you should need to know before hand. Everything has been designed to follow industry
            standard designs, and be simple to use.
        </p>
    </div>
</div>
@endsection

@section('scripts')

@endsection
