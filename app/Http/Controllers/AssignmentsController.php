<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use App\Traits\RolesTrait;
use Illuminate\Http\Request;
use App\Models\Users;
class AssignmentsController extends Controller
{
    use RolesTrait;



    public function index()
    {

        $usersHasAssign = Assignments::with(['users', 'courses'])->paginate(5);

        return view('admin/assignments', ['assignments' => $usersHasAssign, 'role' => $this->getRole()]);
    }


    public function store(Request $request, $id)
    {
        $user = Users::query()->findOrFail($id);

        $checkOut = Assignments::query()->where([
            ['courses_id', $request->get('course')],
            ['users_id', $user['id']]
        ])->first();

        if (!$checkOut) {
            $assign = new Assignments(

                [
                    'courses_id' => $request->get('course'),
                    'users_id' => $user['id'],

                ]);
            $assign->save();
            return redirect(Route( 'admin.users.assignments.index'))
                ->with('status', "Назначен курс для пользователя $user->name $user->surname");
        }

        return redirect(Route( 'admin.users.index'))
            ->with('status', 'У этого пользователя уже есть данный курс');

    }

    public function destroy($id)
    {

        $assign = Assignments::query()->find($id);

        try {
            $assign->delete();
        } catch (\Exception $e) {
        }

        return redirect(Route( 'admin.users.assignments.index'))
            ->with(['status' => "Назначение на курс с id $id отменено"]);
    }

}
