@extends('layouts.admin_interface')

@section('content1')
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Workers</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right;">
                            Create
                          </button>
                    </div>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Create Project</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="POST" action="">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                        <div class="col-md-6">
                                            <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>

                                            @error('project_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="project-from-date" class="col-md-4 col-form-label text-md-right">{{ __('From date') }}</label>

                                        <div class="col-md-6">
                                            <input id="project-from-date" type="date" class="form-control"  name="project_from_date" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="project-to-date" class="col-md-4 col-form-label text-md-right">{{ __('To date') }}</label>

                                        <div class="col-md-6">
                                            <input id="project-to-date" type="date" class="form-control"  name="project_to_date" >
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                        <div class="col-md-6">
                                            <input id="location_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="location_name" value="{{ old('location_name') }}" required autocomplete="project_name" autofocus>
                                            <p> lat </p>
                                            <input id="lat" name="lat" step="any" type="number" class="form-control">
                                            <p> lng </p>
                                            <input id="lng" name="lng" step="any" type="number" class="form-control">

                                        </div>
                                    </div>



                                </form>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Manager By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>
                                            <input type="button" value="Update" style="float: right;">
                                            <input type="button" value="Delete" style="float: right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
                                        <td>
                                            <input type="button" value="Update" style="float: right;">
                                            <input type="button" value="Delete" style="float: right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.5
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5.5</td>
                                        <td>
                                            <input type="button" value="Update" style="float: right;">
                                            <input type="button" value="Delete" style="float: right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 6
                                        </td>
                                        <td>Win 98+</td>
                                        <td>6</td>
                                        <td>
                                            <input type="button" value="Update" style="float: right;">
                                            <input type="button" value="Delete" style="float: right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <td>7</td>
                                        <td>
                                            <input type="button" value="Update" style="float: right;">
                                            <input type="button" value="Delete" style="float: right;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trident</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <td>6</td>
                                        <td>
                                            <input type="button" value="Update" style="float: right;">
                                            <input type="button" value="Delete" style="float: right;">
                                        </td>
                                    </tr>
                                    </tfoot>
                            </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
