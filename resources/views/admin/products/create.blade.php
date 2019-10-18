@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
     <div class="container">
         <div class="row justify-content-center">
             <h2>Create A New Product</h2>
         </div>

         <form>
             <div class="col">
                 <div class="row" style="width: 100%">
                     <div class="md-form form-lg">
                         <input type="text" id="name" name="name" class="form-control form-control-lg">
                         <label for="name">Product Name</label>
                     </div>
                 </div>
             </div>
         </form>
     </div>
@endsection

@section('scripts')

@endsection
