<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 col align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Gallery Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        {{-- <a href="{{ route('galleries.all') }}">
                                            Gallery Management
                                        </a> --}}
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="box box-success">
                                <div class="box-body chat">
                                    {{-- <form action="{{ route('galleries.update', $gallery->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-title">Title</label>
                                                    <input type="text" value="{{ $gallery->title }}" name="title"
                                                        class="form-control form-control-alternative"
                                                        style="color: #0a0a0a">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Image</label>
                                                    <input type="file"
                                                        class="form-control form-control-alternative dropify"
                                                        name="images" onchange="checkFileSize()"
                                                        data-default-file="{{ $gallery->images? asset('uploads/'.$gallery->images->name) :asset('img/no.jpg') }}"
                                                        id="inp_image" accept="image/jpg, image/jpeg, image/png" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="text-center col-lg-12">
                                                <button type="submit" id="submit-btn" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form> --}}
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
            $('.dropify').dropify();
        });

        function checkFileSize() {
            var image = document.getElementById("inp_image");

            if (typeof (image.files) != "undefined") {
                var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
                if (size > 2) {
                    alertDanger("Please select image size less than 2 MB")
                    $("#submit-btn").prop("disabled", true);
                } else {
                    $("#submit-btn").prop("disabled", false);
                }
            } else {
                alertDanger("This browser does not support HTML5.")
                $("#submit-btn").prop("disabled", true);
            }

        }

    </script>
    @endpush

    @push('styles')

    @endpush
</x-app-layout>
