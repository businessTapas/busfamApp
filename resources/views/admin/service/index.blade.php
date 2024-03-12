@extends('layout.app')
@push('css')
@endpush
@push('js')
@endpush
@section('title', 'Banner')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Service </h4>
                                </div>

                                <a class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                    href="" data-bs-toggle="modal" data-bs-target="#addjob"><i class="mdi mdi-plus me-1"></i> New</a>
                                
                            </div>

                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class=" datatable table align-middle table-nowrap table-check" id="job-table">
                                        <thead>
                                            <tr class="ligth">
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                               
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        
                                    </table>
                                    <script type="text/javascript">
                                            $(function() {
                                                var i = 1;
                                                $('#job-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('service.index') }}",
               
                columns: [
                    {
                        data: 'title',
                        name: 'title',
                    },
                       
                    {
                        data: 'description',
                        name: 'description',
                    },
                    
                    {
                        data: 'status',
                        name: 'status',
                    }, 
                   
                    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
               
            });
        });
            </script>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
    </div>
   

    {{-- -------------------------------------------View Mdal------------------------ --}}
<div class="modal fade" tabindex="-1" role="dialog" id="view-modal" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Banner Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="view_modal_body">
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    {{-- ---------------------- View Mdal End------------------------------------------------------------- --}}
    
    {{-- -------------------------------------------Edit Mdal------------------------ --}}
    
    <div class="modal fade"  id="editjob-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Edit Banner Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit_modal_body">
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    
    {{-- ---------------------- Edit Mdal End------------------------------------------------------------- --}}
    @include('admin.service.add')


<script>
        $(document).ready(function () {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                {{-- startDate: new Date() --}}
               {{-- startDate: '{{ $startDate }}' --}}// Use dynamic date here
            });

        });
    </script>
@endsection
