<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\Project;
use Auth;

use \Carbon\Carbon;

class ProjectController extends Controller
{
    //
    //
    public function index() {

        $objs = Project::where('managed', Auth::user()->id)
            ->where('to_date', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
            ->where('from_date', '<=', Carbon::now('Asia/Ho_Chi_Minh'))
            ->get();
        // dd(Auth::user()->id);
        return view('role/manager/project/index', [
            'projects' => $objs,
        ]);
    }


    public function edit($id) {
        $obj = Project::with(['location', 'manager', 'users'])->find($id);
        return view('role/manager/project/edit',[
            'project'=>$obj
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate(
            [
            'project_name' => 'required',
            'from_date' => 'date',
            'to_date' => 'date|after:from_date',
            'time_checkin' => '',
            'time_checkout' => 'after:time_checkin',
            ],

        );
        $obj = Project::find($id);
        $obj->project_name = $request->project_name;
        $obj->number_worker = $request->number_worker;
        $obj->from_date = $request->from_date;
        $obj->to_date = $request->to_date;
        $obj->time_checkin = $request->time_checkin;
        $obj->time_checkout = $request->time_checkout;

        // $obj->location
        $obj->location->update([
            'location_name' => $request->location_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'place_id' => $request->place_id,
        ]);

        $obj->users()->attach($request->user_id);
        $obj->save();
        // dd($obj->location->location_name);
        // dd($obj);
        return redirect()->route('manager.project.index');
    }

}
