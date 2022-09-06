<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Booking Request Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Booking Request Management
                                    </li>
                                </ol>
                            </nav>
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
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>MANAGE</th>
                    </thead>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $key => $booking)
                        <tr class="ok">
                            <td>{{'#bk'.sprintf('%08d',  $booking->id) }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->created_at }}</td>
                            <td>
                                @if ($booking->read == 0)
                                <span class="badge badge-info">pending
                                </span>
                                @else
                                <span class="badge badge-success">read
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="mb-1 dropdown no-arrow">
                                    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cog"></i> </a>
                                    <div class="shadow dropdown-menu dropdown-menu-left animated--fade-in"
                                        aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                        style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item show-product" href="{{ route('bookings.view', $booking->id) }}"
                                            class="btn btn-danger text-danger" title=""><i class="fa fa-eye "></i>&nbsp;View</a>
                                        <a class="dropdown-item delete-slide" href="javascript:void(0)" class="btn btn-danger"
                                            title="" onclick="delconf('{{ route('bookings.delete', $booking->id) }}')"><i
                                                class="far fa-trash-alt"></i>&nbsp;Delete</a>
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
        $(document).ready(function () {
            $('#datatableid').dataTable({
                "language": {
                    "emptyTable": "No data available in the table",
                    "paginate": {
                        "previous": '<i class="ni ni-bold-left"></i>',
                        "next": '<i class="ni ni-bold-right"></i>'
                    }
                },

            });
        });
    </script>
    @endpush
</x-app-layout>
