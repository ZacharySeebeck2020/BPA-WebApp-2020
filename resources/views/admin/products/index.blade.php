@extends('layouts.admin')

@section('title', 'All Products')

@section('head')
    <!-- MDBootstrap Datatables  -->
    <link href="{{ asset('css/addons/datatables.min.css') }}" rel="stylesheet">

    <style>

        {{-- I have this here because there is some problem where the deault table is like half size. This fies that.  --}}
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
                <th class="th-sm">ID
                </th>
                <th class="th-lg">Category
                </th>
                <th class="th-lg">Name
                </th>
                <th class="th-lg">Price
                </th>
            </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->base_name }}</td>
                        <td>{{ $product->base_price }}</td>
                    </tr>
                @endforeach

            </tbody>

            <tfoot>
            <tr>
                <th>ID
                </th>
                <th>Category
                </th>
                <th>Name
                </th>
                <th>Price
                </th>
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