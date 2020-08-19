@extends('role.admin.index')

@section('content')
        <div class="card mb-4">
            <div class="card-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        Choose project
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (count($projects) <= 0)
                            <a class="dropdown-item"> Don't have any project
                    </div>
                @else
                    @foreach ($projects as $project)
                        <a class="dropdown-item" href="{{ route('admin.report.index', ['project_id' => $project->id]) }}">
                            {{ $project->project_name }}
                        </a>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Number days off</th>
                            <th>Time working</th>
                        </tr>
                    </thead>

                    <tbody>


                        @if (count($users) <= 0)
                            <div class="list-group-item list-group-item-action"> Don't
                                have user
                            </div>
                        @else
                            {{-- {{ dd($users->find(9)->absentApplication) }}
                            --}}
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        {{ $user->role }}
                                    </td>
                                    <td> {{ $user->absentApplication->pluck('number_off')->sum() }} </td>
                                    {{-- <td> {{ $user->absentApplication() }}
                                    </td> --}}
                                    <td>
                                        {{ $user->reports->pluck('time_working')->sum() }}
                                        {{-- {{ $user->reports->selectRaw }}
                                        --}}
                                    </td>


                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        {{-- Reject --}}
        <div class="modal fade" id="timework-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Time-Working</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <form method="POST" action="">
                                @csrf

                                <div class="form-group row">
                                    <label for="project_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                    <div class="col-md-6">
                                        <input id="project_name" type="text" class="form-control" name="project_name"
                                            value="" required autocomplete="project_name" autofocus>
                                    </div>
                                </div>



                            </form>
                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @section('script')
        <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            } );
            </script>
        @endsection
    @endsection
