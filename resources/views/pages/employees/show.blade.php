<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Employee Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Employee Management / View
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="text-right col-lg-4">
                            <div>
                                <a href="{{ route('employees.new') }}" class="float-right btn btn-sm btn-neutral">
                                    <i class="fa fa-plus-circle"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="mt-4 row">
            <div class="col-xl-4">
                <div class="p-3 mr-3 rounded media bg-light-media" style="">
                    <div class="media-left">
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="Progile Image" class="media-object"
                            style="width:60px">
                    </div>
                    <div class="ml-3 media-body">
                        <h4 class="media-heading">
                            {{ $employee->name }}<span class="font-weight-light">
                        </h4>
                        <p>
                            {{ $employee->email }}<span class="font-weight-light">
                        </p>
                    </div>
                </div>

                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column" id="tabs-icons-text" role="tablist">
                        <li class="mb-2 nav-item">
                            <a class="nav-link active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true">
                                Personal Information</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="shadow card ">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                                <div class="row">
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>EMP No&nbsp;</strong>
                                            <p>{{ $employee->emp_no }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>First Name&nbsp;</strong>
                                            <p>{{ $employee->first_name }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Last Name&nbsp;</strong>
                                            <p>{{ $employee->last_name }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Email&nbsp;</strong>
                                            <p>{{ $employee->email }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>NIC&nbsp;</strong>
                                            <p>{{ $employee->nic }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Mobile&nbsp;</strong>
                                            <p>{{ $employee->mobile_no }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Land NO&nbsp;</strong>
                                            <p>{{ $employee->land_no }}</p>
                                        </div>
                                    </div>

                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Street Address&nbsp;</strong>
                                            <p>{{ $employee->street_address }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Birthday&nbsp;</strong>
                                            <p>{{ $employee->birthday }}</p>
                                        </div>
                                    </div>
                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Gender&nbsp;</strong>
                                            <p>{!! $tc->getGender($employee->gender) !!}</p>
                                        </div>
                                    </div>

                                    <div class="mb-20 col-6">
                                        <div class="form-group">
                                            <strong>Designation&nbsp;</strong>
                                            <p>{!! $tc->getDesignation($employee->designation) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
@section('css')
    <style>
        .card {
            position: relative;
            min-height: 350px;
        }

        .message {
            display: table;
        }

        .label {
            display: table-cell;
        }

        .text {
            display: table-cell;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: rgb(38, 150, 124);
        }

        .bg-light-media {
            background-color: #fff !important;
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#employee-menu').toggle();
            $('#orders-table').dataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, -1],
                    [5, "All"]
                ],
                "language": {
                    "emptyTable": "No data available in the table",
                    "paginate": {
                        "previous": '<i class="fas fa-arrow-left"></i>',
                        "next": '<i class="fas fa-arrow-right"></i>'
                    },
                },
            });
        });
    </script>
@endsection
