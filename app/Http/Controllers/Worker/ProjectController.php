<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use \App\Project;
use \App\User;
use Auth;

use \Carbon\Carbon;
class ProjectController extends Controller
{
    //
    public function index() {
        $objs = User::find(Auth::user()->id)->projects()
            ->where('to_date', '>=', Carbon::now('Asia/Ho_Chi_Minh'))
            ->where('from_date', '<=', Carbon::now('Asia/Ho_Chi_Minh'))
            ->get();
        // dd($obj);
        $user = User::with(['reports', 'projects'])->find(Auth::user()->id);
        return view('role/worker/project/index', [
            'projects' => $objs,
            'user'=>$user
        ]);
    }
}
