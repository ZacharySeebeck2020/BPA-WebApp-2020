@extends('layouts.admin')

@section('title', 'All Products')

@section('head')
    <!-- MDBootstrap Datatables  -->
    <link href="{{ asset('css/addons/datatables.min.css') }}" rel="stylesheet">

    <style>

        {{-- I have this here because there is some problem where the default table is like half size. This fixes that.  --}}
        #productsTable_wrapper {
            width: 100%;
        }


    </style>

@endsection

@section('content')

    @include('admin.modals.new_product')

    <div class="row pt-2 pb-4">
        <h2 class="py-auto mr-auto">All Products</h2>

        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#newProductModal">
            New Product
        </button>
    </div>

    <div class="row" class="width: 100%">
        <table id="productsTable" class="table table-bordered">
            <thead>
            <tr>
                <th class="th-sm">ID</th>
                <th class="th-lg">Category</th>
                <th class="th-lg">Name</th>
                <th class="th-lg">Price</th>
                <th class="th-lg">Slug</th>
                <th class="th-sm"></th>
            </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category()->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>/products/{{ $product->slug }}</td>
                        <td class="justify-content-center">
                            <div class="row justify-content-center">
                                <form action="{{ route('admin.catalog.products.destroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" hidden name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger px-3"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                </form>

                                <form action="{{ route('admin.catalog.products.edit') }}" method="GET">
                                    <input type="text" hidden name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary px-3"><i class="fas fa-edit" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

            <tfoot>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Slug</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}" defer></script>

    <script>

        $(document).ready(function () {
            $('#productsTable').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });

    </script>
@endsection
