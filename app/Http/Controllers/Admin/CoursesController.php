<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCoursesRequest;
use App\Models\CourseItems;
use App\Models\Courses;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\CourseItemsController;

class CoursesController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $courses = Courses::all();
        $courseItems = CourseItems::all();
        return view('admin.courses.courses', compact('courses','courseItems'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function submit(createCoursesRequest $req)
    {
        Courses::create($req->all());
        return redirect()->route('courses-all');
    }

    public function getAll()
    {
        $course = Courses::simplePaginate(5);
        return view('admin.courses.courses', compact('course'));
    }

    public function edit($id)
    {
        $course = Courses::find($id);

        return view('admin.courses.edit', ['data' => $course]);
    }

    public function delete($id){
        Courses::find($id)->delete();
        return redirect()->route('courses-all');
    }

    public function view($id)
    {
        $course = new Courses;
        return view('admin.courses.view', ['data' => $course->find($id)]);
    }

    public function update(createCoursesRequest $req, $id)
    {
        $course = Courses::find($id);
        $course->fill($req->all());
        $course->save();
        return redirect()->route('courses-all');
    }
}
