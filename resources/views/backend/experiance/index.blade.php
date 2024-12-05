@extends('layouts.backend')
@section('title', 'Experiances')
@section('breadcrumb', 'EXPERIANCES')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="row mb-2">
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.experiance.create') }}" class="btn btn-sm btn-success rounded-3">
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
                                <th style="width: auto">#</th>
                                <th style="width: auto">POSITION</th>
                                <th style="width: auto">INSTITUTE</th>
                                <th style="width: auto">STRAT DATE</th>
                                <th style="width: auto">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($experiances as $experiance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $experiance->position }}</td>
                                    <td>{{ $experiance->institute }}</td>
                                    <td>{{ date('Y', strtotime($experiance->start_year)) }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('dashboard.experiance.show', $experiance->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info"></i>
                                            </a>

                                            <a href="{{ route('dashboard.experiance.edit', $experiance->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('dashboard.experiance.destroy', $experiance->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-sm btn-danger dlt-experiance">
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
                        {{ $experiances->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.dlt-experiance').on('click', function() {
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
