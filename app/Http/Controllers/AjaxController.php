<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Employee;

class AjaxController extends Controller
{
    public function getcurrentposition(Request $request)
	{
		$currentposition = Position::where('id', Auth::User()->position_id)->value('position_name');
		return json_encode(array('status'=>'ok', 'data'=>$currentposition));
	}

    public function getpositionfromdepartment(Request $request)
    {
        $position = Position::where('department_id', $request->department_id)->pluck('position_name', 'position_id')->toJson();
		return json_encode(array('status'=>'ok', 'data'=>$position));
    }
}