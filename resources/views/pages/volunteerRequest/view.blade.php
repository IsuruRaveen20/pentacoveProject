<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text-dark d-inline-block">Volunteer Request Management </h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('requests.all') }}">
                                            Volunteer Request Management
                                        </a>
                                    </li>
                                    @if ($volunteers != null)
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{'#vlt-'.sprintf('%08d',  $volunteers->id) }}</li>
                                    @else
                                    <li class="breadcrumb-item active" aria-current="page">view</li>
                                    @endif
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
            <div class="col-lg-8">
                <div class="mt-5 shadow card">
                    <div class="card-body">
                        @if ($volunteers != null)
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="mb-20 col-6">
                                    <div class="form-group">
                                        <strong>Name&nbsp;</strong>
                                        <p>{{ $volunteers->name }}</p>
                                    </div>
                                </div>
                                <div class="mb-20 col-6">
                                    <div class="form-group">
                                        <strong>Email</strong>
                                        <p>{{ $volunteers->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-20 col-lg-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <strong>Subject&nbsp;</strong>
                                        <p>{{ $volunteers->subject }}</p>
                                    </div>
                                </div>
                                <div class="mb-20 col-6">
                                    <div class="form-group">
                                        <strong>Date&nbsp;</strong>
                                        <p>{{ $volunteers->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <strong>Message&nbsp;</strong>
                            <p>{{ $volunteers->message }}</p>
                        </div>
                        @else
                        <div class="text-center col-12">
                            <strong>
                                <h2>Visitor Request Not Found</h2>
                            </strong>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @push('scripts')

    @endpush

    @push('styles')
    <style>
        .card {
            position: relative;
            min-height: 300px;
            width: 900px;
        }

    </style>
    @endpush
</x-app-layout>
