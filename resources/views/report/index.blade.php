@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Report Manager') }}
                    {{-- <button class="btn btn-secondary justify-content-end">
                        <a class="text-white" href={{ route('report.create', ['id' => $project->id]) }}>Create</a>
                    </button> --}}
                </div>

                <div class="card-body">

                    @if ($report->state == -1)
                        <form action="{{ route('report.checkout', ['id' => $project->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="location_name" value="meomeo">

                            <input type="number" hidden name="lat" id="lat" value=12>

                            <input type="number" hidden name="lng" id="lng" value=22>
                            <div class="project-name">
                                <label for="project-name"> Project name</label>
                                <input type="text" name="project_name" id="project-name" readonly value="{{ $project->project_name }}">
                            </div>
                            <button type="submit"> Checkout</button>
                        </form>

                    @elseif ($report->state == -2)
                        <form action="{{ route('report.checkin', ['id' => $project->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="location_name" value="meomeo">

                            <input type="number" hidden name="lat" id="lat" value=12>

                            <input type="number" hidden name="lng" id="lng" value=22>
                            <div class="project-name">

                                <label for="project-name"> Project name</label>
                                <input type="text" name="project_name" id="project-name" readonly value="{{ $project->project_name }}">
                            </div>
                            <button type="submit"> Checkin</button>
                        </form>
                    @else
                        <form action="{{ route('report.create', ['id' => $project->id, 'report_id' => $report->id]) }}" method="get">
                            <button type="submit"> Create Report </button>
                        </form>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
