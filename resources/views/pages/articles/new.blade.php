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
        <form action="{{ route('articles.store') }}" id="new_article" method="POST" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-lg-8 ">
                    <div class="card">
                        <div class="card-body">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Title</label>
                                            <input type="text" id="title" name="title"
                                                wire:model="article.title" class="form-control form-control-alternative"
                                                required>
                                            @error('article.title')
                                                <small id="int_article"
                                                    class="text-danger form-text text-muted error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Introduction</label>
                                            <textarea name="Introduction" id="Introduction" rows="2" wire:model="article.introduction"
                                                class="form-control  form-control-alternative" required></textarea>
                                            @error('article.Introduction')
                                                <small id="int_article"
                                                    class="text-danger form-text text-muted error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Description</label>
                                            <textarea class="form-control form-control-alternative" type="text" name="description" id="inp_description"
                                                class="form-control" cols="30" rows="10" required></textarea>
                                            @error('article.description')
                                                <small id="int_article"
                                                    class="text-danger form-text text-muted error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="pl-lg-1">
                                    <div class="row ">
                                        <div class="col-lg-12">
                                            <label class="form-control-label">Category</label>
                                            <select class="form-control select2 category-selector" id="category_id"
                                                name="category_id">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="card-body">
                                <label class="form-control-label">Image</label>
                                <input type="file" onchange="checkFileSize()"
                                    class="form-control form-control-alternative dropify" name="images"
                                    id="inp_image" accept="image/jpg, image/jpeg, image/png"
                                    aria-describedby="helpId" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="pl-lg-1">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class=" text-center">
                                                    <button type="submit" class="btn btn-info"
                                                        id="submit-btn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
</x-app-layout>
