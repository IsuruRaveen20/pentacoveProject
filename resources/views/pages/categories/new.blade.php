<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Gallery Image Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        {{-- <a href="{{ route('galleries.all') }}">
                                            Gallery Image Management
                                        </a> --}}
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">New</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="box box-success">
                                <div class="box-body chat">
                                    <div class="pl-lg-4">
                                        <h6 class="mb-4 heading-small text-muted">Gallery Image Information</h6>
                                        <form action="{{ route('categories.store') }}" method="POST"
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
                                                        <label class="form-control-label" for="name">Title</label>
                                                        <input type="text" name="title" placeholder="Title"
                                                            class="form-control form-control-alternative"
                                                            style="color: #0a0a0a" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Image</label>
                                                        <input type="file" onchange="checkFileSize()"
                                                            class="form-control form-control-alternative dropify" name="images"
                                                            id="inp_image" accept="image/jpg, image/jpeg, image/png"
                                                            aria-describedby="helpId" placeholder="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center col-lg-12">
                                                    <button type="submit" id="submit-btn" class="btn btn-primary">Create</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
                $("#submit-btn").prop("disabled", true);
                alertDanger("This browser does not support HTML5.")
            }

        }

    </script>
    @endpush

    @push('styles')

    @endpush
</x-app-layout>
