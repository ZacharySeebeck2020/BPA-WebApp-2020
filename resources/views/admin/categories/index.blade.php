@extends('layouts.admin.app')

@section('title', 'Administration - All Categories')

@section('style')
{{-- Regular Datatables CSS --}}
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
{{-- Responsive Extension Datatables CSS --}}
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
{{-- Custom Datatables CSS --}}
<link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- Header --}}
<div class="p-8 flex flex-row">
    <div class="w-1/2">
        <h1 class="text-3xl my-auto"><i class="fas fa-tags text-orange-500"></i> Categories</h1>
    </div>
    <div class="w-1/2 text-right">
        <button class="modal-open bg-orange-500 hover:bg-orange-700 text-white font-bold my-auto py-2 px-4 rounded">
            <i class="fas fa-plus"></i> New Category
        </button>
    </div>
</div>


{{-- Categories Table --}}
<div id='categories' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <table id="categories_table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="0" class="text-left">ID</th>
                <th data-priority="1">Name</th>
                <th data-priority="2">Slug</th>
                <th data-priority="3" class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="text-left">{{ $category->id }}</td>
                    <td class="text-center">{{ $category->name }}</td>
                    <td class="text-center">{{ $category->slug }}</td>
                    <td class="text-right"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!--/Card-->

@endsection

@section('scripts')
{{-- jQuery --}}
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

{{-- Datatables --}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    // Initialize the Datatable.
    $(document).ready(function () {

        var table = $('#categories_table').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
@endsection
