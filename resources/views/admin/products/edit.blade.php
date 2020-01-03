@extends('layouts.admin.app')

@section('title', "Administration - Edit Category ({$category->name})")

@section('style')

@endsection

@section('content')

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('POST')

    {{-- Header --}}
    <div class="p-8 flex">
        <div class="w-1/2">
            <h1 class="text-3xl my-auto"><i class="fas fa-tags text-orange-500"></i> Edit Category</h1>
        </div>
        <div class="w-1/2 text-right my-auto">
            <a href="{{ route('admin.categories.index') }}" class="button button_red">
                <i class="fas fa-times"></i> Cancel
            </a>
            <button type="submit" href="#" class="button button_green">
                <i class="fas fa-edit"></i> Update
            </button>
        </div>
    </div>

    {{-- Content --}}
    <div class="content_card">
        <div class="my-5">
            <label class="input_label" for="name">Name</label>
            <input class="input_field" name="name" type="text" required value="{{ old('name') ?? $category->name }}" placeholder="Category Name (ex. Clothing)">
        </div>

        <div class="my-5">
            <label class="input_label" for="slug">Slug <span class="text-gray-600">( {{ config('app.url')}}/{slug} )</span></label>
            <input class="input_field" name="slug" type="text" required value="{{ old('slug') ?? $category->slug }}" placeholder="URL Slug (ex. clothing)">
        </div>
    </div>
</form>

@endsection

@section('scripts')

@endsection
