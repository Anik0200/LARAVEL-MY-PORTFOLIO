@extends('layouts.backend')
@section('title', 'Projects')
@section('breadcrumb', 'PROJECTS')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="row mb-2">
                <div class="col-lg-4">
                    <a href="{{ route('dashboard.project.create') }}" class="btn btn-sm btn-success rounded-3">
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
                                <th style="width: auto">THUMB</th>
                                <th style="width: auto">TITLE</th>
                                <th style="width: auto">STATUS</th>
                                <th style="width: auto">DATE</th>
                                <th style="width: auto">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <img src="{{ asset('projectImages/' . $project->thumbnail) }}"
                                            alt="{{ $project->title }}" width="50">
                                    </td>

                                    <td>
                                        {{ $project->title }}
                                    </td>

                                    <td>
                                        @if ($project->status == 'active')
                                            <a href="{{ route('dashboard.project.inactive', $project->id) }}"
                                                class="badge bg-success">Active</a>
                                        @else
                                            <a href="{{ route('dashboard.project.active', $project->id) }}"
                                                class="badge bg-danger">Inactive</a>
                                        @endif
                                    </td>

                                    <td>
                                        {{ $project->created_at->format('d M Y') }}
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('dashboard.project.show', $project->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-info"></i>
                                            </a>

                                            <a href="{{ route('dashboard.project.edit', $project->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('dashboard.project.destroy', $project->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a class="btn btn-sm btn-danger dlt-project">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <h4 class="badge bg-danger mb-2">No Data</h4>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $projects->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('script')
    <script>
        $('.dlt-project').on('click', function() {
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
