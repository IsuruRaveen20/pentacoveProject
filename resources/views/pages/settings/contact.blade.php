<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Contact Settings</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('settings.contact') }}">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="row justify-content-center">
            <div class="col-xl-8 order-xl-1">
                <div class="shadow card">
                    <div class="card-body">
                        <div>
                            <div style="min-height: 20vh">
                                <form role="form" action="{{route('settings.update.contact')}}" method="POST"
                                    enctype="multipart/form-data">
                                    <h6 class="mb-4 heading-small text-muted">Contact Information</h6>
                                    {{csrf_field()}}
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address"> Address &nbsp;(<i
                                                    class="fa fa-address-card" aria-hidden="true"></i>)</label>
                                            <input type="text" id="address" name="address"
                                                class="form-control form-control-alternative @error('address') is-invalid @enderror"
                                                placeholder="Address "
                                                value="{{isset($contacts->address) ?$contacts->address:''}}">
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-telephone"> Telephone &nbsp;(<i
                                                    class="fa fa-phone" aria-hidden="true"></i>)</label>
                                            <input type="text" id="input-telephone" name="telephone"
                                                class="form-control form-control-alternative @error('telephone') is-invalid @enderror"
                                                placeholder="Telephone"
                                                value="{{isset($contacts->telephone) ?$contacts->telephone:''}}">
                                            @error('telephone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-mobile"> Mobile &nbsp;(<i
                                                    class="fa fa-mobile" aria-hidden="true"></i>)</label>
                                            <input type="text" id="input-mobile" name="mobile"
                                                class="form-control form-control-alternative @error('mobile') is-invalid @enderror"
                                                placeholder="Mobile Number"
                                                value="{{isset($contacts->mobile) ?$contacts->mobile:''}}">
                                            @error('telephone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-name"> Email &nbsp;(<i
                                                    class="fa fa-envelope-o" aria-hidden="true"></i>)</label>
                                            <input type="email" id="input-name" name="email"
                                                class="form-control form-control-alternative @error('email') is-invalid @enderror"
                                                placeholder="Email"
                                                value="{{isset($contacts->email) ?$contacts->email:''}}">
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-name"> Email 2&nbsp;(<i
                                                    class="fa fa-envelope-o" aria-hidden="true"></i>)</label>
                                            <input type="email" id="input-name" name="email2"
                                                class="form-control form-control-alternative @error('email2') is-invalid @enderror"
                                                placeholder="Email 2"
                                                value="{{isset($contacts->email2) ?$contacts->email2:''}}">
                                            @error('email2')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-3 row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="text-center ">
                                                    <button type="submit" class="btn btn-info"
                                                        id="submitbtnvideo">Update</button>
                                                </div>
                                            </div>
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
    @push('scripts')
    <script>
        $(document).ready(function () {
            $('#homesubmenu').toggle();
        });

    </script>
    @endpush
</x-app-layout>
