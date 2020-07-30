@extends('role.manager.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mt-4">Report list</h3>
                </div>
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose project
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (count($projects) <= 0)
                                <div class="dropdown-item"> Manager do not manage any project </div>
                            @else
                                @foreach ($projects as $project)
                                    <a class="dropdown-item" href="{{ route('manager.user.index', ['project_id' => $project->id]) }}">
                                        {{ $project->project_name }}
                                    </a>
                                @endforeach
                            @endif


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
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($users) <= 0)
                                    <td> Don't have worker </td>
                                @else
                                    @foreach ($users as $user)
                                    <tr>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td> {{ $user->role }} </td>
                                        <td>
                                            <a type="button" type="button"
                                            href="{{ route('manager.report.index', ['user_id']) }}" class="btn btn-primary">
                                                Reports
                                            </button>


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

@endsection
