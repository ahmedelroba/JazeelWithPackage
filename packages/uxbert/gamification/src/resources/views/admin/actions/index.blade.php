@extends('layouts.app')
@section('title', 'Actions Management')

@section('style')
<link href="{{ asset('admin/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content-header')
<a href="{{ route('integration_system.actions.create') }}" class="btn btn-round  edit btn-primary">{{ trans('backend.create_new_action') }}</a>
@endsection

@section('content-container')
{{ auth()->user()->brand->id }}

<!--begin: Datatable -->
<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Points</th>
            <th>Key</th>
            <th>Type</th>
            <th>Transactions</th>
            <th style="width:20%">Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Points</th>
            <th>Key</th>
            <th>Type</th>
            <th>Transactions</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>

<!--end: Datatable -->
@endsection

@section('javascript')

<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('admin/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/vendors/custom/components/vendors/sweetalert2/init.js') }}" type="text/javascript"></script>
<!--begin::Page Scripts(used by this page) -->

<script>
    var KTDatatablesExtensionButtons = function() {

        var initTable1 = function() {
            // begin first table
            var table = $('#kt_table_1').DataTable({
                responsive: true,
                // Pagination settings
                dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                processing: true,
                serverSide: true,
                buttons: [
                    'print',
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                ajax: {
                    url: '{!! route('integration_system.actions.get_ajax_roles') !!}',
                    type: 'GET',
                    data: {
                        // parameters for custom backend script demo
                        columnsDef: [
                            ],
                    },
                },
                columns: [
                    {data: 'name'},
                    {data: 'points'},
                    {data: 'key'},
                    {data: 'type'},
                    {data: 'transactions'},
                    {data: 'action'},
                ],
                "language": {
                    "decimal": "",
                    "emptyTable": "{{trans('backend.No_data_available_in_table')}}",
                    "infoEmpty": "{{trans('backend.Showing_0_to_0_of_0_entries')}}",
                    "info":           "{{trans('backend.showing')}}_START_ {{trans('backend.to')}} _END_ {{trans('backend.of')}} _TOTAL_{{trans('backend.entries')}} ",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "{{trans('backend.show_t')}}_MENU_ {{trans('backend.entries')}}",
                    "search": "{{trans('backend.search')}}",
                    "zeroRecords": "{{trans('backend.No_matching_records_found')}}",
                    "processing":     "{{trans('backend.processing')}}",

                    "paginate": {
                        "first": "{{trans('backend.First')}}",
                        "last": "{{trans('backend.Last')}}",
                        "next": "{{trans('backend.Next')}}",
                        "previous": "{{trans('backend.Previous')}}"
                    }

                }

            });

        };


        return {
            //main function to initiate the module
            init: function() {
                initTable1();
            },
        };

    }();

    jQuery(document).ready(function() {
        KTDatatablesExtensionButtons.init();
    });
</script>

<script>

        $('#kt_table_1').on('click', '.btn-delete[data-remote]', function (e) {
        e.preventDefault();

        var url = $(this).data('remote');

        Swal.fire({
            title: "{{trans('Are you sure?')}}",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            buttons: ['{{trans('backend.no')}}', '{{trans('backend.yes')}}'],
        }).then(function(yes) {
            console.log(yes.value)
            if (yes.value) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: { submit: true, "_token": "{{ csrf_token() }}",}
                }).always(function (data) {
                    $('#kt_table_1').DataTable().draw(false);
                });
            }
            else {
                return false;
            }
        })

    })
</script>
@endsection
