@extends('layouts.admin.app')

@section('title', "Administration - Edit Product ({$product->name})")

@section('style')
<style>
    .toggle__dot {
        top: -.25rem;
        left: -.25rem;
        transition: all .4s ease-in-out;
    }

    input:checked~.toggle__dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }

</style>
@endsection

@section('content')

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Header --}}
    <div class="p-8 flex">
        <div class="w-1/2">
            <h1 class="text-3xl my-auto"><i class="fas fa-shopping-bag text-green-500"></i> Update Product</h1>
        </div>
        <div class="w-1/2 text-right my-auto">
            <a href="{{ route('admin.products.index') }}" class="button button_red">
                <i class="fas fa-times"></i> Cancel
            </a>
            <button type="submit" class="button button_green">
                <i class="fas fa-plus"></i> Create
            </button>
        </div>
    </div>

    {{-- Content --}}
    <div class="content_card mb-5">
        <div class="content-card bg-gray-200 px-10 pt-10 pb-1 rounded-lg my-5">
            <div class="">
                <h2 class="text-gray-800 text-3xl">Basic Information</h2>
            </div>
            <div class="mx-3">
                <div class="my-2">
                    <label class="input_label" for="name">Name <span class="required">*</span></label>
                    <input class="input_field" name="name" type="text" required value="{{ old('name') ?? $product->name }}"
                        placeholder="Product Name (ex. T-Shirt)">
                </div>

                <div class="my-5">
                    <label class="input_label" for="slug">Slug <span class="required">*</span> <span class="text-gray-600">{{ config('app.url')}}/{slug} )</span></label>
                    <input class="input_field" name="slug" type="text" required value="{{ old('slug') ?? $product->slug }}"
                        placeholder="URL Slug (ex. t-shirt)" required>
                </div>

                <div class="my-5">
                    <label class="input_label" for="price">Price <span class="required">*</span></label>
                    <input class="input_field" name="price" type="text" required value="{{ old('price') ?? $product->price }}"
                        placeholder="$12.53">
                </div>

                <div class="my-5">
                    <div class="relative">
                        <label class="input_label" for="category">Product Category <span class="required">*</span></label>
                        <select required name="category" class="input_field appearance-none">
                            <option disabled>Select A Category</option>
                            @foreach ($categories as $category)
                                <option {{ old('category') ?? $product->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 mt-8 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="my-5">
                    <div class="flex items-center justify-left w-full">
                        <label for="featured" class="flex items-center cursor-pointer">
                            <div class="mr-3 input_label">
                                Feature Product On Homepage
                            </div>
                            <div class="relative">
                                <input id="featured" name="feature" value="{{ old('select') ?? $product->feature }}" type="checkbox" class="hidden" />
                                <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                </div>
                            </div>
                        </label>

                    </div>
                </div>
            </div>
        </div>

        <div class="content-card bg-gray-200 px-10 pt-10 pb-1 rounded-lg my-5">
            <div class="">
                <h2 class="text-gray-800 text-3xl">Page Information</h2>
            </div>
            <div class="mx-3">
                <div class="my-5">
                    <label class="input_label" for="image">Product Image (Square aspect ratio reccomended)</label>
                    <div class="flex w-full items-center justify-center bg-grey-lighter">
                        <label class="flex items-center px-4 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue">
                            <svg class="w-8 h-8 pr-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="text-base leading-normal" id="imageN">Select a product image</span>
                            <input type='file' id="image" name="image" class="hidden" />
                        </label>
                    </div>
                </div>
                <div class="my-5">
                    <label class="input_label" for="short_description">Short Desctiption</label>
                    <input class="input_field mb-5" name="short_description" value="{{ old('short_description') ?? $product->short_description }}">
                </div>

                <div class="my-5">
                    <label class="input_label" for="description">Product Description <span class="required">*</span></label>
                    <textarea class="input_field mb-5" name="description" id="product_description" required>
                        {{ old('description') ?? $product->description }}
                    </textarea>
                </div>

                <div class="my-5">
                    <label class="input_label" for="features">Product Features</label>
                    <textarea class="input_field mb-5" name="features" id="product_features" required>
                        {{ old('features') ?? $product->details }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="p-8 flex">
        <div class="w-1/2"> </div>
        <div class="w-1/2 text-right my-auto">
            <a href="{{ route('admin.products.index') }}" class="button button_red">
                <i class="fas fa-times"></i> Cancel
            </a>
            <button type="submit" class="button button_green">
                <i class="fas fa-plus"></i> Create
            </button>
        </div>
    </div>

</form>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/f7w6hiyzv7ysezi70n72tdd77vwr53z9lrq1yr2l1dqme6cv/tinymce/5/tinymce.min.js">
</script>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

{{-- Product WYCIWYG Editor Inilizations --}}
<script>
    tinymce.init({
        selector: '#product_description'
    });

    tinymce.init({
        selector: '#product_features'
    });

</script>

{{-- FileInput Custom JavaScript --}}
<script>
$('#image').change(function() {
    var i = $(this).prev('label').clone();
    var file = $('#image')[0].files[0].name;
    $('#imageN').text('Selected: ' + file);
});
</script>
@endsection
