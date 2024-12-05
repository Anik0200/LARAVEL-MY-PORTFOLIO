@extends('layouts.backend')
@section('title', 'Educations')
@section('breadcrumb', 'EDUCATIONS')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="row mb-2">
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.education.create') }}" class="btn btn-sm btn-success rounded-3">
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
                                <th style="width: auto">DEGREE</th>
                                <th style="width: auto">INSTITUTE</th>
                                <th style="width: auto">STRAT DATE</th>
                                <th style="width: auto">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($educations as $education)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $education->deegre }}</td>
                                    <td>{{ $education->institute }}</td>
                                    <td>{{ date('Y', strtotime($education->start_year)) }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('dashboard.education.show', $education->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-info"></i>
                                            </a>

                                            <a href="{{ route('dashboard.education.edit', $education->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('dashboard.education.destroy', $education->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-sm btn-danger dlt-education">
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
                        {{ $educations->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.dlt-education').on('click', function() {
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
