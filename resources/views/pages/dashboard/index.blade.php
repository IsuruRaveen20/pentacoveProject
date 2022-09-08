<x-app-layout>
    @section('title', 'Admin Dashboard')
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 col align-items-center">
                        <h6 class="mb-0 h2 text-dark d-inline-block">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                            class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col-auto">
                                <div class="text-white shadow icon icon-shape rounded-circle"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                                <i class="fas fa-arrow-circle-right"></i>
                                </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col-auto">
                                <div class="text-white shadow icon icon-shape rounded-circle"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                                <i class="fas fa-arrow-circle-right"></i>
                                </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col-auto">
                                <div class="text-white shadow icon icon-shape rounded-circle"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                                <i class="fas fa-arrow-circle-right"></i>
                                </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </x-slot>
    @push('scripts')
        <script>
            $(document).ready(function() {

            });
        </script>
    @endpush
</x-app-layout>
