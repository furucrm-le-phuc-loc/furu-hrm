@extends('role.admin.index')

@section('content')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });

    </script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4">Dashboard</h1>
                    </div>
                </div>
                <br>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Choose Month
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="{{ route('admin.dashboard.absent') }}">
                                    All month
                                </a>
                                @for ($i = 1; $i < 13; $i++)
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard.absent', ['month' => $i]) }}">
                                        {{ $i }}
                                    </a>
                                @endfor

                            </div>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Choose Session
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item"
                                    href="{{ route('admin.dashboard.absent') }}">
                                    All Session
                                </a>
                                @for ($j = 1; $j < 5; $j++)
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard.absent', ['session' => $j]) }}">
                                        {{ $j }}
                                    </a>
                                @endfor

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Time Absent</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @if (count($users) <= 0)
                                        <div class="list-group-item list-group-item-action"> Don't
                                            have user
                                        </div>
                                    @else
                                        {{-- {{ dd($users[7]->absentApplication) }} --}}
                                        {{-- {{ dd($users[7]->time_absent()) }} --}}
                                        {{-- {{ dd($month) }} --}}
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    {{ $user->role }}
                                                </td>
                                                {{-- <td> {{ $user->absentApplication->pluck('number_off')->sum() }} </td> --}}
                                                {{-- <td> {{ $user->absentApplication() }}
                                                </td> --}}
                                                <td>
                                                    {{ $user->time_absent($month, $session) }}
                                                    {{-- {{ $user->reports->pluck('time_working')->sum() }} --}}

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
            </div>
        </main>
        {{-- Reject --}}

    </div>
@endsection
