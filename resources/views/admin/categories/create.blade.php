@extends('layouts.admin.app')

@section('title', 'Administration - New Category')

@section('style')

@endsection

@section('content')

<form action="{{ route('admin.categories.create') }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Header --}}
    <div class="p-8 flex">
        <div class="w-1/2">
            <h1 class="text-3xl my-auto"><i class="fas fa-tags text-orange-500"></i> New Category</h1>
        </div>
        <div class="w-1/2 text-right my-auto">
            <a href="{{ route('admin.categories.index') }}" class="bg-red-500 hover:bg-red-700 button">
                <i class="fas fa-times"></i> Cancel
            </a>
            <button type="submit" href="#" class="bg-green-500 hover:bg-green-700 button">
                <i class="fas fa-plus"></i> Create
            </button>
        </div>
    </div>

    {{-- Content --}}
    <div class="content_card">
        <div class="my-5">
            <label class="input_label" for="name">Name</label>
            <input class="input_field" name="name" type="text" required value="{{ old('name') }}" placeholder="Category Name (ex. Clothing)">
        </div>

        <div class="my-5">
            <label class="input_label" for="slug">Slug <span class="text-gray-600">( {{ config('app.url')}}/{slug} )</span></label>
            <input class="input_field" name="slug" type="text" required value="{{ old('slug') }}" placeholder="URL Slug (ex. clothing)">
        </div>
    </div>
</form>

@endsection

@section('scripts')

@endsection
