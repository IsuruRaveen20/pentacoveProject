<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Category Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Category Management
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="text-right col-lg-4">
                            <div>
                                <button data-toggle="modal" data-target="#addCategory"
                                    class="float-right btn btn-sm btn-neutral">
                                    <i class=" fa fa-plus-circle"></i> Add New
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="border-0 shadow card">
            <div class="py-4 table-responsive">
                <table class="table" id="datatableid" class="dataTables">
                    <thead class="thead-light">
                        <th>#</th>
                        <th>Title</th>
                        <th>status</th>
                        <th>Manage</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr class="ok">
                                <td>{{ ++$key }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{!! $tc->getStatus($category->status) !!}</td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i> </a>
                                        <div class="shadow dropdown-menu dropdown-menu-left animated--fade-in"
                                            aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                            style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item edit-brand"
                                                onclick="editCategoryModel('{{ $category->id }}')"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>&nbsp;Edit
                                            </a>
                                            @if ($category->status == 1)
                                            <a class="dropdown-item change-status" href="javascript:void(0)" class="btn btn-danger"
                                                title="" onclick="decline('{{ route('categories.status.change',$category->id) }}')"><i
                                                    class="fas fa-times-circle"></i>&nbsp;Deactivate</a>
                                            @else
                                            <a class="dropdown-item change-status" href="javascript:void(0)" class="btn btn-danger"
                                                title="" onclick="approve('{{ route('categories.status.change',$category->id) }}')"><i
                                                    class="far fa-check-square"></i>&nbsp;Active</a>
                                            @endif
                                            <a class="dropdown-item delete-slide" href="javascript:void(0)"
                                                class="btn btn-danger" title=""
                                                onclick="delconf('{{ route('categories.delete', $category->id) }}')"><i
                                                    class="far fa-trash-alt"></i>&nbsp;Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="add_CategoryLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_CategoryLabel">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categories.store') }}" id="add_category" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inp_category">Post Category</label>
                                <input type="text" name="title" class="form-control" id="inp_category"
                                    aria-describedby="inp_category" placeholder="Enter Category" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="add_CategoryLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_CategoryLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="editCategoryContent">
                        <form action="{{ route('categories.update', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inp_Category">Category</label>
                                        <input type="text" name="title" class="form-control" id="inp_category"
                                            aria-describedby="inp_category" value="{{ $category->title }}"
                                            placeholder="Enter Category" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h6 class="text-center responsive-mobile">
                                            <button id="submit-btn" type="submit" class="btn btn-info">
                                                Update Category
                                            </button>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#category-menu').toggle();
            });

            $(document).ready(function() {
                $('#datatableid').dataTable({
                    "language": {
                        "emptyTable": "No data available in the table",
                        "paginate": {
                            "previous": '<i class="ni ni-bold-left"></i>',
                            "next": '<i class="ni ni-bold-right"></i>'
                        },
                        "sEmptyTable": "No data available in the table"
                    },
                });
            });

            function editCategoryModel(element) {
                var category_id = element;
                var url = '{{ route('categories.edit', ':category_id') }}';
                url = url.replace(':category_id', category_id);
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    success: function(response) {
                        $('#editCategory').modal('show');
                        $('#editCategoryContentModel').html(response);

                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
