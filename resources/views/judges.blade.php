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
        <div class="flex md:flex-row flex-col mt-2">
            <div class="content_card md:w-1/3 w-full shadow-lg m-4">
                <h3 class="text-gray-900 text-xl w-full text-center">Standard User</h3>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Email Address: </h4>
                    <h4 class="text-gray-700 ml-auto">user@ewsg.cf</h4>
                </div>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Password: </h4>
                    <h4 class="text-gray-700 ml-auto">3W$gP@s$</h4>
                </div>
            </div>

            <div class="content_card md:w-1/3 w-full shadow-lg m-4">
                <h3 class="text-gray-800 text-xl w-full text-center">Administrative User</h3>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Email Address: </h4>
                    <h4 class="text-gray-700 ml-auto">admin@ewsg.cf</h4>
                </div>
                <div class="lg:w-3/4 lg:mx-auto mt-2">
                    <h4 class="text-gray-800">Password: </h4>
                    <h4 class="text-gray-700 ml-auto">3W$gP@s$</h4>
                </div>
            </div>

            <div class="content_card md:w-1/3 w-full shadow-lg m-4">
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

    <h4 class="text-gray-800 text-xl mt-5">
        To Satisfy Any Further Requirements.
    </h4>

    <div class="p-4 text-gray-700 text-lg">
        <p>
            This project was created in whole by students a part of the BAISD-CC-AM (04-0011) Business Professionals of America chapter.
        </p>
        <p class="text-gray-800 text-xl mt-2">Students Involved:</p>
        <ul class="ml-4">
            <li>Zachary Seebeck</li>
            <li>Nicholas Stothard</li>
            <li>Anthony Chippi</li>
            <li>Samantha McGuire</li>
        </ul>
    </div>
</div>
@endsection

@section('scripts')

@endsection
