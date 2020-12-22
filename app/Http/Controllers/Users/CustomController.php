<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\CourseItems;

class CustomController extends Controller
{
    public function show(int $id)
    {
        $courseItems = CourseItems::query()->with('course')->where('course_id', $id)->get();
        return view('custom.block',['courseItems' => $courseItems, 'id' => $id ] );
    }

    public function getAll()
    {
        $course = Courses::paginate(5);
        return view('custom.courses', compact('course'));
    }

    public function view($id)
    {
        $course = new Courses;
        return view('custom.view', ['data' => $course->find($id)]);
    }
}