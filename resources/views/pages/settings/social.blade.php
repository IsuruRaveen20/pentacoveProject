<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Social Settings</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('settings.social') }}">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Social</li>
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
                            <div>
                                <form role="form" action="{{route('settings.update.social')}}" method="POST"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <h6 class="mb-4 heading-small text-muted">Social Media Information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-name"> Facebook URL
                                                        &nbsp;(<i class="fa fa-facebook"
                                                            aria-hidden="true"></i>)</label>
                                                    <input type="text" id="input-name" name="facebook"
                                                        class="form-control form-control-alternative @error('facebook') is-invalid @enderror"
                                                        placeholder="Facebook URL "
                                                        value="{{ isset($social->facebook) ?$social->facebook:'' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-name">Youtube URL
                                                        &nbsp;(<i class="fa fa-youtube" aria-hidden="true"></i>)</label>
                                                    <input type="text" id="input-name" name="youtube"
                                                        class="form-control form-control-alternative @error('vimeo') is-invalid @enderror"
                                                        placeholder="Youtube URL "
                                                        value="{{isset($social->youtube) ?$social->youtube:''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-name">Instagram URL
                                                        &nbsp;( <i class="fa fa-instagram" aria-hidden="true"></i>
                                                        )</label>
                                                    <input type="text" id="input-name" name="instagram"
                                                        class="form-control form-control-alternative "
                                                        placeholder="Instagram URL "
                                                        value="{{isset($social->instagram) ?$social->instagram:''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="text-center ">
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" class="btn btn-info"
                                                            id="submitbtnvideo">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                </div>
                                <div class="table-responsive">
                                </div>
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
