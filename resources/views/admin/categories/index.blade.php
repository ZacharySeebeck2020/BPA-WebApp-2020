@extends('layouts.admin')

@section('title', 'All Categories')

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

    @include('admin.modals.new_category')

    <div class="row pt-2 pb-4">
        <h2 class="py-auto mr-auto">All Categories</h2>

        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#newCategoryModal">
            Add Category
        </button>
    </div>

    <div class="row" class="width: 100%">
        <table id="productsTable" class="table table-bordered">
            <thead>
            <tr>
                <th class="th-lg">Name
                </th>
                <th class="th-sm" style="width: 10%">Visible
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->visible_in_menu }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Name
                </th>
                <th>Visible
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
