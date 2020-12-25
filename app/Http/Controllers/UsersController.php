<?php

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    //view с пагинацией
//    public function index()
//    {
////
////        return view('admin/viewUsers',
////            [
//////                'users' => DB::table('users')->paginate(5)
////            ]);
//
//
//    }

    public function index()
    {

        $users = Users::query()->with('role')->get();

        $courses = DB::table('courses')
            ->get();

        return view('admin/viewUsers', ['users' => $users, 'courses' => $courses]);
    }


    public function create(): View
    {
        $roles = DB::table('roles')
            ->get();

        return view('admin/createUser', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:users|max:255',
            'name' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect(Route('users.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $user = new Users([
            'login' => $request->get('login'),
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'birthdate' => $request->get('birthdate'),
            'password' => Hash::make($request->get('password')),
            'role_id' => $request->get('role'),

        ]);

        $user->save();
        return redirect(Route('users.index'));

    }

    public function destroy($id)
    {

        /**
         * @var Users|null $user
         */

        $user = Users::query()->findOrFail($id);

        $user->delete();

        return redirect(route('users.index'))
            ->with('status', "Удален пользователь $user->name $user->surname");
    }

    public function edit($id)
    {
        $user = Users::query()->findOrFail($id);

        $roles = DB::table('roles')
            ->get();

        return view('admin/updateUser', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $user = Users::query()->findOrFail($id);
        $validator = Validator::make($request->all(), [
            'login' => 'required|max:255',
            'name' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect(Route('users.edit', $user))
                ->withErrors($validator);
        }

        /**
         * @var Users|null $user
         */
        $user = Users::query()->findOrFail($id);
        $user->login = $request->get('login');
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->birthdate = $request->get('birthdate');
        $user->password = Hash::make($request->get('password'));
        $user->role_id = $request->get('role');
        $user->save();
        return redirect(Route('users.index'));

    }
}
