<?php

namespace LaravelElms\ClassRoomApi\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelElms\ClassRoomApi\Models\Department;
use LaravelElms\ClassRoomApi\Models\DepartmentSession;
class ClassRoomController extends Controller
{
    public function departments($partner_id){
        return $Department = Department::where('partner_id',$partner_id)->get();
    }
    
    public function sessions($department_id){
        return $DepartmentSession = DepartmentSession::where('department_id',$department_id)->get();
    }

    public function classes(Request $request){
        return $request->all();
    }
}
