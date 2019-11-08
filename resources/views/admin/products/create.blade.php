@extends('layouts.admin')

@section('title', 'Create Product')

@section('head')
    <style>
        .required {
            color: red;
        }
    </style>
@endsection

@section('content')
     <div class="container justify-content-center">
         <form action="{{ route('admin.catalog.products.create') }}" method="post">
             @csrf
             @method('PUT')
             <div class="row pt-2">
                 <h2 class="pt-2 mr-auto">Add A New Product</h2>

                 <a href="{{ route('admin.catalog.products.index') }}" class="btn btn-danger ml-auto mr-3">
                     Discard Changes
                 </a>

                 <button type="submit" class="btn btn-success">
                     Save Changes
                 </button>
             </div>

             <div class="row pb-4">
                 <hr style="width: 100%">
             </div>

             <div class="row pt-2 mx-auto" style="width: 90%">
                 <h4 class="pt-2 mr-auto">General</h4>
             </div>

             <div class="row pb-2 mx-auto" style="width: 90%">
                 <hr style="width: 100%">
             </div>

             <div class="row mx-auto" style="width: 90%">
                 <div class="col">
                    <label for="sku" class="py-auto">SKU <small class="required">*</small> </label>
                    <input type="text" id="sku" name="sku" required class="form-control" style="max-width: 91%">
                 </div>
             </div>

             <div class="row mx-auto pt-1" style="width: 90%">
                 <div class="col">
                     <label for="name" class="py-auto">Name <small class="required">*</small> </label>
                     <input type="text" id="name" name="name" required class="form-control" style="max-width: 91%">
                 </div>
             </div>

             <div class="row mx-auto pt-1" style="width: 90%">
                 <div class="col">
                     <label for="slug" class="py-auto">URL Slug <small class="required">*</small>   Ex. (/product/____)</label>
                     <input type="text" id="slug" name="slug" required class="form-control" style="max-width: 91%">
                 </div>
             </div>



             <div class="row pt-5 mx-auto" style="width: 90%">
                 <h4 class="pt-2 mr-auto">Description</h4>
             </div>

             <div class="row pb-2 mx-auto" style="width: 90%">
                 <hr style="width: 100%">
             </div>

             <div class="row mx-auto" style="width: 90%">
                 <div class="col">
                     <label for="short_description" class="py-auto">Short Description</label>
                     <textarea type="text" id="short_description" name="short_description" class="form-control"></textarea>
                 </div>
             </div>

             <div class="row mx-auto pt-2" style="width: 90%">
                 <div class="col">
                     <label for="description" class="py-auto">Main Description</label>
                     <textarea type="text" id="description" name="description" class="form-control"></textarea>
                 </div>
             </div>



             <div class="row pt-5 mx-auto" style="width: 90%">
                 <h4 class="pt-2 mr-auto">Price</h4>
             </div>

             <div class="row pb-2 mx-auto" style="width: 90%">
                 <hr style="width: 100%">
             </div>

             <div class="row mx-auto" style="width: 90%">
                 <div class="col">
                     <label for="price" class="py-auto">Price ($) <small class="required">*</small> </label>
                     <input type="text" id="price" name="price" required class="form-control" style="max-width: 91%">
                 </div>
             </div>

             <div class="row mx-auto pt-1 pb-4" style="width: 90%">
                 <div class="col">
                     <label for="cost" class="py-auto">Cost ($)</label>
                     <input type="text" id="cost" name="cost" class="form-control" style="max-width: 91%">
                 </div>
             </div>

         <div class="row pb-4">
             <hr style="width: 100%">
         </div>

         <div class="row pt-2">
             <a href="{{ route('admin.catalog.products.create') }}" class="btn btn-danger ml-auto mr-3">
                 Discard Changes
             </a>

             <button type="submit" class="btn btn-success">
                 Save Changes
             </button>
         </div>
    </form>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/f7w6hiyzv7ysezi70n72tdd77vwr53z9lrq1yr2l1dqme6cv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#short_description'
        });
        tinymce.init({
            selector: '#description'
        });
    </script>
@endsection
