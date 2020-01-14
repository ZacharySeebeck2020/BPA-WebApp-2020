@extends('layouts.admin.app')

@section('title', 'Administration - All Orders')

@section('style')
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<!--Custom Datatables CSS-->
<link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="p-8 flex flex-row">
    <div class="w-1/3">
        <h1 class="text-3xl my-auto"> <i class="fas fa-archive text-blue-500"></i></i> Orders {{ isset($status) ? 'With Status: ' . $status : ''}}</h1>
    </div>
    <div class="w-2/3 flex text-right">
        <h3 class="text-lg-text-gray-700 my-auto ml-auto mr-2">Status: </h3>
        <a href="{{ route('admin.orders.index') }}" class="button_sm button_blue my-auto">All</a>
        <a href="{{ route('admin.orders.index_by_status', 'OPEN') }}" class="button_sm button_blue my-auto">Open</a>
        <a href="{{ route('admin.orders.index_by_status', 'READY') }}" class="button_sm button_blue my-auto">Ready</a>
        <a href="{{ route('admin.orders.index_by_status', 'SHIPPED') }}" class="button_sm button_blue my-auto">Shipped</a>
        <a href="{{ route('admin.orders.index_by_status', 'DELIVERED') }}" class="button_sm button_blue my-auto">Delivered</a>
        <a href="{{ route('admin.orders.index_by_status', 'CLOSED') }}" class="button_sm button_blue my-auto">Closed</a>
        {{-- ['OPEN', 'READY', 'SHIPPED', 'DELIVERED', 'CLOSED'] --}}
    </div>
</div>

<!--Card-->
<div id='categories' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <table id="orders_table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="1">Status</th>
                <th data-priority="2">Type</th>
                <th data-priority="3">Identifier</th>
                <th data-priority="6" class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="text-center">{{ $order->status }}</td>
                    <td class="text-center">{{ $order->type }}</td>
                    <td class="text-center">{{ $order->identifier }}</td>
                    <td class="float-right flex">
                        <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button_sm button_red"><i class="fas fa-times"></i> Delete</button>
                        </form>
                        <a href="{{ route('admin.orders.view', $order->id) }}" class="button_sm button_blue"><i class="fas fa-eye"></i> View</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
<!--/Card-->

@endsection

@section('scripts')
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {

        var table = $('#orders_table').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });

</script>
@endsection
