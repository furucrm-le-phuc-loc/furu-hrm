@extends('role.manager.layout')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        {{ __('Report Project') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <form>
                                <div class="form-group">
                                    <label for="project_name">Name User</label>
                                    <input type="text" class="form-control" readonly
                                        value="{{ $report->project_user->user->name }}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="time_checkin">Time checkin</label>
                                    <input type="time" class="form-control" id="time_checkin" readonly
                                        value="{{ $report->time_checkin }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="time_checkout">Time checkout</label>
                                        <input type="time" class="form-control" id="time_checkout" readonly
                                        value="{{ $report->time_checkout }}">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="location_checkin">Location checkin</label>
                                        {{-- {{ dd($report->location_checkin) }} --}}
                                        <input type="text" class="form-control" id="location_checkin" readonly
                                            value="{{ (isset($report->location_checkin)) ? $report->location_checkin->location_name : "" }}">
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label for="location_checkout">Location checkout</label>
                                        <input type="text" class="form-control" id="location_checkout" readonly
                                        value="{{ (isset($report->location_checkout)) ? $report->location_checkout->location_name : "" }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="hidden" id="lat-checkin"
                                            value="{{ (isset($report->location_checkin)) ? $report->location_checkin->lat : "" }}">
                                        <input type="hidden" id="lng-checkin"
                                            value="{{ (isset($report->location_checkin)) ? $report->location_checkin->lng : "" }}">
                                        <div id="map-checkin" class="map"></div>
                                        {{-- {{ dd($report->location_checkin) }} --}}
                                        </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" id="lat-checkout"
                                            value="{{ (isset($report->location_checkout)) ? $report->location_checkout->lat : "" }}">
                                        <input type="hidden" id="lng-checkout"
                                            value="{{ (isset($report->location_checkout)) ? $report->location_checkout->lng : "" }}">
                                        <div id="map-checkout" class="map"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project_name">Project</label>
                                    <input type="text" class="form-control" id="project_name" readonly
                                    value="{{ $report->project_user->project->project_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control"
                                    name="content" rows="5" readonly>
                                        {{ $report->content }}
                                    </textarea>
                                </div>

                                @if ($report->state != 2)
                                    <a type="button" href="{{ route('manager.report.approve', ['id' => $report->id, 'user_id' => $report->project_user->user->id]) }}"
                                        class="btn btn-primary">
                                        Approve
                                    </a>
                                    <button type="button" class="btn btn-primary btn-reject-report" data-toggle="modal"
                                        data-target="#reject-modal"
                                        data-project_name = "{{ $report->project_user->project->project_name }}"
                                        data-name = "{{ $report->project_user->user->name }}"
                                        data-manager = "{{ $report->project_user->project->managed }}"
                                        data-user_id = "{{ $report->project_user->user->id }}"
                                        data-report_id = "{{ $report->id }}"
                                        >
                                        Reject
                                    </button>
                                @endif


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- reject model --}}
    <div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-reject-report" method="POST" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">

                                @csrf

                                <div class="form-group row">
                                    <label for="project_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                                    <div class="col-md-6">
                                        <input id="reject-project-name" type="text" class="form-control" name="project_name"
                                            value="" required autocomplete="project_name" autofocus>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="reject-name" type="text" class="form-control" name="name" value="" required
                                            autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="manager_by" class="col-md-4 col-form-label text-md-right">Manager by</label>
                                    <div class="col-md-6">
                                        <input id="reject-manager-by" type="text" class="form-control" name="manager_by" value=""
                                            required autocomplete="manager_by" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Reasons</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="content" rows="3"></textarea>
                                    </div>
                                </div>


                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#reject-modal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                $("#reject-project-name").val(button.data("project_name"));
                $("#reject-name").val(button.data("name"));
                $("#reject-manager-by").val(button.data("manager"));
                $("#form-reject-report").attr('action', '/manager/report/reject/'
                    + button.data("report_id") + "?user_id="
                    + button.data("user_id"));
            })
            $('.modal').modal({backdrop: 'static', keyboard: false, show: false});
            // $(".btn-reject-report").click(function(e) {
            //     // var updateUrl = $(this).val(button.data("project_name"));
            //     confirm(button.data("project_name"));

            // });
        })
        function initAutocomplete() {
            var lat_checkin = parseFloat($('#lat-checkin').val());
            var lng_checkin = parseFloat($('#lng-checkin').val());
            var lat_checkout = parseFloat($('#lat-checkout').val());
            var lng_checkout = parseFloat($('#lng-checkout').val());

            var position_checkin = new google.maps.LatLng(lat_checkin, lng_checkin);
            var position_checkout = new google.maps.LatLng(lat_checkout, lng_checkout);
            // confirm(m_lat + "-------" + m_lng);
            const map_checkin = new google.maps.Map(document.getElementById("map-checkin"), {
                center: position_checkin,
                zoom: 13,
                // mapTypeId: "roadmap"
            });

            var marker_checkin = new google.maps.Marker({
                position: position_checkin,
                map: map_checkin
            });

            const map_checkout = new google.maps.Map(document.getElementById("map-checkout"), {
                center: position_checkout,
                zoom: 13,
                // mapTypeId: "roadmap"
            });

            var marker_checkout = new google.maps.Marker({
                position: position_checkout,
                map: map_checkout
            });



        }

    </script>
@endsection
