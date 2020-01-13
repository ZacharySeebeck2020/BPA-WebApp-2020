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
    <form action="{{ route('order.store') }}" class="w-2/3 p-5" method="POST">
        @csrf
        <div>
            {{-- Contact Information --}}
            <div>
                <h1 class="text-xl text-gray-700 font-bold mb-3">Contact Information</h1>
                <hr class="border-b border-black opacity-25 my-0 py-0" />
                <div class="w-10/12 p-5 w-full">
                    <div class="flex w-full py-3">
                        <div class="w-1/2 pr-2">
                            <label class="input_label" for="name_first">First Name<span class="required">*</span></label>
                            <input class="input_field w-full" name="name_first" type="text" maxlength="50" required value="{{ old('name_first') }}" placeholder="John">
                        </div>
                        <div class="w-1/2 pl-2">
                            <label class="input_label" for="name_last">Last Name<span class="required">*</span></label>
                            <input class="input_field w-full" name="name_last" type="text" maxlength="50" required value="{{ old('name_last') }}" placeholder="Doe">
                        </div>
                    </div>
                    <div class="flex w-full py-3">
                        <div class="w-full">
                            <label class="input_label" for="email">E-Mail Address<span class="required">*</span></label>
                            <input class="input_field w-full" name="email" type="text" required value="{{ old('email') }}" placeholder="john.doe@example.com">
                        </div>
                    </div>
                    <div class="flex w-full py-3">
                        <div class="w-full">
                            <label class="input_label" for="phone">Phone Number<span class="required">*</span></label>
                            <input class="input_field w-full" name="phone" type="number" maxlength="10" required value="{{ old('phone') }}" placeholder="XXX-XXX-XXXX">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Billing & Shipping Information --}}
            <div>
                <h1 class="text-xl text-gray-700 font-bold mb-3">Billing/Shipping Information</h1>
                <hr class="border-b border-black opacity-25 my-0 py-0" />
                <div class="w-10/12 p-5 w-full">
                    <div class="flex w-6/10 py-3">
                        <div class="w-full pr-2">
                            <label class="input_label" for="address">Address<span class="required">*</span></label>
                            <input class="input_field w-full" name="address" type="text" required value="{{ old('address') }}" placeholder="123 Example Rd.">
                        </div>

                        <div class="w-4/10">
                            <label class="input_label" for="zip">Zip Code<span class="required">*</span></label>
                            <input class="input_field w-full" name="zip" type="numeric" required value="{{ old('zip') }}" placeholder="48708">
                        </div>
                    </div>
                    <div class="flex w-full py-3">
                        <div class="w-1/2 pr-2">
                            <label class="input_label" for="phone">State<span class="required">*</span></label>
                            <select required name="state" class="input_field appearance-none w-full">
                                <option {{ old('state') ? '' : 'selected' }} disabled>Select A State</option>
                                    @foreach ($states as $state)
                                        <option {{ old('state') == $state ? 'selected' : ''}} value="{{ $state }}">{{ $state }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="w-1/2">
                            <label class="input_label" for="city">City<span class="required">*</span></label>
                            <input class="input_field w-full" name="city" type="text" required value="{{ old('city') }}" placeholder="Bay City">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment Information --}}
            <div>
                <h1 class="text-xl text-gray-700 font-bold mb-3">Payment Information</h1>
                <hr class="border-b border-black opacity-25 my-0 py-0" />
                <div class="w-10/12 p-5 w-full">
                    <div class="flex w-full py-3">
                        <div class="w-7/12 pr-2">
                            <label class="input_label" for="cc_num">Card Number (No Dashes)<span class="required">*</span></label>
                            <input class="input_field w-full" name="cc_num" type="number" maxlength="16" minlength="16" required value="{{ old('cc_num') }}" placeholder="XXXXXXXXXXXXXXXX">
                        </div>
                        <div class="w-5/12 pl-2">
                            <label class="input_label">Card Expiry Date<span class="required">*</span></label>
                            <div class="flex">
                                <select name='cc_exp_mon' required class="input_field appearance-none mr-2">
                                    <option value=''>Month</option>
                                    <option value='01'>January</option>
                                    <option value='02'>February</option>
                                    <option value='03'>March</option>
                                    <option value='04'>April</option>
                                    <option value='05'>May</option>
                                    <option value='06'>June</option>
                                    <option value='07'>July</option>
                                    <option value='08'>August</option>
                                    <option value='09'>September</option>
                                    <option value='10'>October</option>
                                    <option value='11'>November</option>
                                    <option value='12'>December</option>
                                </select>
                                <select name='cc_exp_yr' required class="input_field appearance-none">
                                    <option value=''>Year</option>
                                    <option value='20'>2020</option>
                                    <option value='21'>2021</option>
                                    <option value='22'>2022</option>
                                    <option value='23'>2023</option>
                                    <option value='24'>2024</option>
                                    <option value='25'>2025</option>
                                    <option value='26'>2026</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full py-3">
                        <div class="w-9/12 mr-2">
                            <label class="input_label" for="cc_name">Card Holder Name<span class="required">*</span></label>
                            <input class="input_field w-full" name="cc_name" type="text" required value="{{ old('cc_name') }}" placeholder="John Doe">
                        </div>
                        <div class="w-3/12">
                            <label class="input_label" for="cc_cvv">CVV<span class="required">*</span></label>
                            <input class="input_field w-full" name="cc_cvv" type="number" maxlength="3" required placeholder="XXX">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Checkout --}}
            <div>
                <hr class="border-b border-black opacity-25 my-1" />
                <div class="w-10/12 p-5 w-full">
                    <div class="flex w-full py-3">
                        <button type="submit" class="ml-auto button button_green">Complete Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Cart Information --}}
    <div class="w-1/3 pl-5 p-5 rounded-r-lg border-l-2 border-gray-500">
        <h1 class="text-xl text-gray-700  font-bold mb-3 text-center">Your Cart</h1>
        <hr class="border-b border-black opacity-25 my-0 py-0" />
        @foreach ($cart->products as $product)
            <a href="{{ route('products.view', $product->slug) }}">
                <div class="w-full mx-auto py-2 my-3 my-1 flex border-b-2 rounded-b-sm border-gray-400">
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
        <hr class="border-b border-black opacity-25 my-0 py-0" />
        <div class="flex w-full">
            <h3 class="text-xl text-gray-600 mb-3">Your Total:</h3>
            <h3 class="text-xl text-gray-700 mb-3 ml-auto">$152.22</h3>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
