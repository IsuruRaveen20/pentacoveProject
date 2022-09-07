<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Article Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Article Management
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="text-right col-lg-4">
                            <div>
                                <a href="{{ route('articles.new') }}" class="float-right btn btn-sm btn-neutral">
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
        <div class="border-0 shadow card">
            <div class="py-4 table-responsive">
                <table class="table" id="datatableid" class="dataTables">
                    <thead class="thead-light">
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($articles as $key => $article)
                            <tr class="ok">
                                <td>{{ ++$key }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->categoryName }}</td>
                                <td>{!! $tc->getStatus($article->status) !!}</td>
                                {{-- <td>{{ $article->nic }}</td> --}}
                                {{-- <td>{!! $tc->getDesignation($employe->designation) !!}</td>
                                <td>{!! $tc->getStatus($employe->status) !!}</td> --}}
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i> </a>
                                        <div class="shadow dropdown-menu dropdown-menu-left animated--fade-in"
                                            aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                            style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                                            <a class="dropdown-item edit-product"
                                                href="{{ route('articles.edit', $article->id) }}"
                                                class="btn btn-warning" title="">
                                                <i class="fas fa-edit"></i>&nbsp;Edit
                                            </a>

                                            <a class="dropdown-item edit-product"
                                                href="{{ route('articles.view', $article->id) }}"
                                                class="btn btn-warning" title="">
                                                <i class="fas fa-eye"></i>&nbsp;View
                                            </a>
                                            <a class="dropdown-item delete-slide" href="javascript:void(0)"
                                                class="btn btn-danger" title=""
                                                onclick="delconf('{{ route('articles.delete', $article->id) }}')"><i
                                                    class="far fa-trash-alt"></i>&nbsp;Delete
                                            </a>
                                            @if ($article->status == 1)
                                                <a class="dropdown-item change-status" href="javascript:void(0)"
                                                    class="btn btn-danger" title=""
                                                    onclick="decline('{{ route('articles.status.change', $article->id) }}')"><i
                                                        class="fas fa-times-circle"></i>&nbsp;Deactivate</a>
                                            @else
                                                <a class="dropdown-item change-status" href="javascript:void(0)"
                                                    class="btn btn-danger" title=""
                                                    onclick="approve('{{ route('articles.status.change', $article->id) }}')"><i
                                                        class="far fa-check-square"></i>&nbsp;Active</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        </script>
    @endpush
</x-app-layout>
