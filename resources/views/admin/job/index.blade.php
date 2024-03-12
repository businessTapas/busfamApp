@extends('layout.app')
@push('css')
@endpush
@push('js')
@endpush
@section('title', 'Job')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Job List</h4>
                                </div>

                                <a class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                    href="" data-bs-toggle="modal" data-bs-target="#addjob"><i class="mdi mdi-plus me-1"></i> New Job</a>
                                
                            </div>

                            <div class="card-body">
                                <div class="table-responsive-lg">
                                    <table class=" datatable table align-middle table-nowrap table-check" id="job-table">
                                        <thead>
                                            <tr class="ligth">
                                                <th>#</th>
                                                <th>Job Title</th>
                                                 <th>Salary From</th> 
                                                 <th>Salary To</th> 
                                                 <th>Company Name</th> 
                                                 <th>Shift Type</th>
                                                <th>Location</th> 
                                                <th>Image</th>
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
                ajax: "{{ route('job.index') }}",
               
                columns: [{
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'job_title',
                        name: 'job_title',
                    },
                    {
                        data: 'salary_from',
                        name: 'salary_from',
                    },
                    {
                        data: 'salary_to',
                        name: 'salary_to',
                    },
                    {
                        data: 'company_name',
                        name: 'company_name',
                    },
                    {
                        data: 'shift_type',
                        name: 'shift_type',
                    },
                    {
                        data: 'location_address',
                        name: 'location_address',
                    },
                    {
                        data: 'company_logo_image',
                        name: 'company_logo_image',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<img src=" '+data+' "  alt="Logo"  class="img-fluid" style="width:50px">';
                                
                        }
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
                <h5 class="modal-title" id="myLargeModalLabel">View Job</h5>
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
                    <h5 class="modal-title" >Edit Job Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit_modal_body">
                   
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    
    {{-- ---------------------- Edit Mdal End------------------------------------------------------------- --}}
    @include('admin.job.add')


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
