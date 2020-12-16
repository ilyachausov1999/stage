<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCoursesRequest;
use App\Models\Courses;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\LengthAwarePaginator;

class CoursesController extends Controller
{
    use ValidatesRequests;

    public function create()
    {
        return view('admin.createCourse');
    }

    public function submit(createCoursesRequest $req)
    {
        Courses::create($req->all());
        return redirect()->route('courses-all');
    }

    public function getAll()
    {
        $course = Courses::simplePaginate(5);
        return view('admin.viewCourses', compact('course'));
    }

    public function edit($id)
    {
        $course = Courses::find($id);

        return view('admin.editCourse', ['data' => $course]);
    }

    public function delete($id)
    {
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
