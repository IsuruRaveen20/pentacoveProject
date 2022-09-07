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
                                        Employee Management / Add New
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
        <div class="container-fluid">
            <form action="{{ route('employees.store') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">Emp No</label>
                                            <input type="text" class="form-control form-control-alternative"
                                                name="emp_no" id="inp_emp_no" aria-describedby="helpId"
                                                placeholder="Emp No" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control form-control-alternative"
                                                name="first_name" id="inp_firstname" aria-describedby="helpId"
                                                placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control form-control-alternative"
                                                name="last_name" id="inp_lastname" aria-describedby="helpId"
                                                placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control form-control-alternative"
                                                name="email" id="inp_email" onkeyup="validateEmail()"
                                                aria-describedby="helpId" placeholder="Email" required>
                                            <span id="email_msg"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="text">NIC</label>
                                            <input type="text" class="form-control form-control-alternative"
                                                name="nic" id="inp_nic" onkeyup="validateNIC()"
                                                aria-describedby="helpId" placeholder="NIC" required>
                                            <span id="nic_msg"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mobile_no">Mobile No</label>
                                            <input type="number" class="form-control form-control-alternative"
                                                name="mobile_no" id="mobile_no" aria-describedby="helpId"
                                                placeholder="Mobile No" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="land_no">Land No</label>
                                            <input type="number" class="form-control form-control-alternative"
                                                name="land_no" id="land_no" aria-describedby="helpId"
                                                placeholder="Land No" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="birthday">DOB</label>
                                            <input class="form-control form-control-alternative datepicker"
                                                autocomplete="off" id="birthday" type="date" name="birthday"
                                                placeholder="Birthday">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="gender">Gender</label>
                                            <div>
                                                <select class="form-control gender-selector" style="width: 100%"
                                                    name="gender" id="gender" required>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="designation">Designation</label>
                                            <div>
                                                <select class="form-control designation-selector" style="width: 100%"
                                                    name="designation" id="designation" required>
                                                    <option value="1">Manager</option>
                                                    <option value="2">Worker</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="street_address">Address</label>
                                            <input type="text" class="form-control form-control-alternative"
                                                name="street_address" id="street_address" aria-describedby="helpId"
                                                placeholder="Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <h6 class="text-center responsive-moblile">
                                                <button id="submit-btn" type="submit" class="btn btn-primary">
                                                    Add Employee
                                                </button>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
@section('js')
<script>

    function validateEmail() {
        $.ajax({
            url: "{{ route('employees.check.email') }}?email=" + $('#inp_email').val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function (response) {
                if (response == 1) {
                    $('#email_msg').text('Email is Available');
                    $('#email_msg').addClass("text-success").removeClass("text-danger");
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#email_msg').text('Email is already exists');
                    $('#email_msg').addClass("text-danger").removeClass("text-success");
                    $('#submit-btn').prop('disabled', true);
                }
            }
        });
    }

    function validateNIC() {
        $.ajax({
            url: "{{ route('employees.check.nic') }}?nic=" + $('#inp_nic').val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            success: function (response) {
                if (response == 1) {
                    $('#nic_msg').text('NIC is Available');
                    $('#nic_msg').addClass("text-success").removeClass("text-danger");
                    $('#submit-btn').prop('disabled', false);
                } else {
                    $('#nic_msg').text('NIC is already exists');
                    $('#nic_msg').addClass("text-danger").removeClass("text-success");
                    $('#submit-btn').prop('disabled', true);
                }
            }
        });
    }

</script>
@endsection

@section('css')
<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        border: #f0fafa;
        border-radius: .375rem;
        background-color: #fff;
        background-clip: border-box;
    }

</style>
@endsection
