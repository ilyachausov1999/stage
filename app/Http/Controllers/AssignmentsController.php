<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use Illuminate\Http\Request;
use  App\Models\Users;
use Illuminate\Support\Facades\Validator;

class AssignmentsController extends Controller
{
    public function index()
    {
        $usersHasAssign = Assignments::with(['users', 'courses'])->get();

        return view('admin/assignments', ['assignments' => $usersHasAssign]);

    }


    public function store(Request $request, $id)
    {
        $user = Users::query()->findOrFail($id);
        $validator = Validator::make($request->all(), [
//            'courses_id' => 'required',

        ]);
        if ($validator->fails()){
            return redirect(Route('assignments.index'));
        }
        $assign = new Assignments(

            [
                'courses_id' => $request->get('course'),
                'users_id' =>   $user['id'],

            ]);
        $assign -> save();
        return redirect(Route('assignments.index'));
    }

    public function destroy($id)
    {


        return redirect(Route('assignments.index'));
    }



}
