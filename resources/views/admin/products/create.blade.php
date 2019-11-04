@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
     <div class="container justify-content-center">
         <div class="row pt-2">
             <h2 class="pt-2 mr-auto">Add A New Product</h2>

             <button type="button" class="btn btn-danger ml-auto mr-3" data-toggle="modal" data-target="#newProductModal">
                 Discard Changes
             </button>

             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#newProductModal">
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
             <div class="row">
                 <label for="sku">SKU</label>
             </div>
             <input type="text" id="sku" name="sku" required value="{{request()->route()->sku}}" class="form-control" style="max-width: 75%">
         </div>
     </div>
@endsection

@section('scripts')

@endsection
