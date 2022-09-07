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
                                        Employee Management
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
                            {{ $employee->first_name }} {{ $employee->last_name }}<span class="font-weight-light">
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
                                Basic Information</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="shadow card ">
                    <div class="card-body ">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                                <form class="clearfix tab-wizard wizard-circle wizard"
                                    action="{{ route('employees.update', $employee->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="first_name">Emp No</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="emp_no" value="{{ $employee->emp_no }}" id="inp_emp_no"
                                                    aria-describedby="helpId" placeholder="Emp No" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="first_name" value="{{ $employee->first_name }}"
                                                    id="inp_firstname" aria-describedby="helpId"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="last_name" value="{{ $employee->last_name }}"
                                                    id="inp_lastname" aria-describedby="helpId" placeholder="Last Name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="email" value="{{ $employee->email }}" id="inp_email"
                                                    onkeyup="validateEmail()" aria-describedby="helpId"
                                                    placeholder="Email" required>
                                                <span id="email_msg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="text">NIC</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="nic" value="{{ $employee->nic }}" id="inp_nic"
                                                    onkeyup="validateNIC()" aria-describedby="helpId"
                                                    placeholder="NIC" required>
                                                <span id="nic_msg"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="mobile_no">Mobile No</label>
                                                <input type="number" class="form-control form-control-alternative"
                                                    name="mobile_no" value="{{ $employee->mobile_no }}"
                                                    id="mobile_no" aria-describedby="helpId" placeholder="Mobile No"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="land_no">Land No</label>
                                                <input type="number" class="form-control form-control-alternative"
                                                    name="land_no" value="{{ $employee->land_no }}" id="land_no"
                                                    aria-describedby="helpId" placeholder="Land No" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="birthday">DOB</label>
                                                <input class="form-control form-control-alternative datepicker"
                                                    autocomplete="off" value="{{ $employee->birthday }}"
                                                    id="birthday" type="date" name="birthday"
                                                    placeholder="Birthday">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="gender">Gender</label>
                                                <div>
                                                    <select class="form-control gender-selector" style="width: 100%"
                                                        name="gender" id="gender" required>
                                                        <option value="1"
                                                            {{ $employee->gender == 1 ? 'selected' : '' }}>Male</option>
                                                        <option value="2"
                                                            {{ $employee->gender == 2 ? 'selected' : '' }}>Female
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="designation">Designation</label>
                                                <div>
                                                    <select class="form-control designation-selector"
                                                        style="width: 100%" name="designation" id="designation"
                                                        required>
                                                        <option value="1"
                                                            {{ $employee->designation == 1 ? 'selected' : '' }}>Manager
                                                        </option>
                                                        <option value="2"
                                                            {{ $employee->designation == 2 ? 'selected' : '' }}>Worker
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="street_address">Address</label>
                                                <input type="text" class="form-control form-control-alternative"
                                                    name="street_address" value="{{ $employee->street_address }}"
                                                    id="street_address" aria-describedby="helpId"
                                                    placeholder="Address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-lg-12">
                                            <h6 class="text-center ">
                                                <button class="btn btn-info" id="submit-btn"
                                                    type="submit">Update</button>
                                            </h6>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
