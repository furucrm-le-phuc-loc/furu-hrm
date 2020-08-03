@extends('layouts.admin_interface')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Assign Project') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="project_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                <div class="col-md-6">
                                    <input id="project_name" type="text" class="form-control" name="project_name"
                                        value="{{ $project->project_name }}"
                                        required autocomplete="project_name" autofocus>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="manager-select" class="col-md-4 col-form-label text-md-right">Manager
                                    select</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="manager-select" name="manager">
                                        {{-- <beautify start="@foreach" end="@endforeach"
                                            exp="^^$managers as $manage^^"> --}}
                                            {{-- <option class="project-manager" value="{{ $manage->id }}">
                                                {{ $manage->name }}</option> --}}
                                            @if (count($managers) <= 0)
                                                <option class="project-manager disable" value="1">
                                                    Don't have manager
                                                </option>
                                            @else
                                                @if ($project->managed == 1)
                                                    <option class="project-manager disable" value="1">
                                                        {{ $admin->name }}
                                                    </option>
                                                @else
                                                    <option class="project-manager disable" value="1">
                                                        Select Manager
                                                    </option>
                                                @endif

                                                @foreach ($managers as $manager)
                                                    <option class="project-manager" value="{{ $manager->id }}">
                                                        {{ $manager->name }}
                                                    </option>
                                                @endforeach
                                            @endif


                                            {{-- </beautify> --}}
                                    </select>
                                </div>
                                {{-- <input id="manager" type="text" name="manager"> --}}
                            </div>

                            <div class="form-group row">
                                <label for="manager-select" class="col-md-4 col-form-label text-md-right">Worker
                                    select</label>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Choose worker
                                    </button>
                                </div>
                            </div>



                            <!-- Modal -->

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">List Workers</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group">
                                                {{-- <beautify start="@foreach" end="@endforeach"
                                                    exp="^^$workers as $worker^^">

                                                    <li class="list-group-item">
                                                        <input type="checkbox" value="{{ $worker->id }}" name="workers[]"
                                                            id="workers-project">
                                                        {{ $worker->name }} - {{ $worker->role }}
                                                    </li>
                                                </beautify> --}}

                                                @if (count($workers) <= 0)
                                                    Don't have worker
                                                @else
                                                    @foreach ($workers as $worker)
                                                       @if (count($worker->projects()->get()) < 2)
                                                            <li class="list-group-item">
                                                                <input type="checkbox" value="{{ $worker->id }}" name="workers[]"
                                                                    id="workers-project">
                                                                {{ $worker->name }} - {{ $worker->role }}
                                                            </li>
                                                       @endif
                                                    @endforeach
                                                @endif



                                            </ul>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('input#manager').val($("project-manager[selected='selected']").val());
        });

    </script>
@endsection
