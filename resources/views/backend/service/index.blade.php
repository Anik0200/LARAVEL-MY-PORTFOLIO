@extends('layouts.backend')
@section('title', 'Services')
@section('breadcrumb', 'SERVICES')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="row mb-2">
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.service.create') }}" class="btn btn-sm btn-success rounded-3">
                        ADD NEW
                        <i class="las la-plus"></i>
                    </a>
                </div>
            </div>


            <div class="card rounded-3 border-0">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 10%">ICON</th>
                                <th style="width: 30%">TITLE</th>
                                <th style="width: 30%">DESCRIPTION</th>
                                <th style="width: 20%">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <i class="{{ $service->icon }}"></i>
                                    </td>
                                    <td>
                                        {{ $service->title }}
                                    </td>
                                    <td>
                                        {{ substr($service->description, 0, 40) . '...' }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('dashboard.service.show', $service->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info"></i>
                                            </a>

                                            <a href="{{ route('dashboard.service.edit', $service->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('dashboard.service.destroy', $service->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-sm btn-danger dlt-service">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <h4 class="badge bg-danger">No Data</h4>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $services->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.dlt-service').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest("form").submit();
                }
            });
        });
    </script>
@endsection
