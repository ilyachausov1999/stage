<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseItems;
use App\Models\CourseItemTest;


class CourseItemsController extends Controller
{
    public function index(int $id)
    {
        $courseItems = CourseItems::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/content-blocks',['courseItems' => $courseItems, 'id' => $id ]);
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'description' => 'required',
            'text' => 'required',
        ]);

        $courseItem = new CourseItems([
            'description' => $request->get('description'),
            'text' => $request->get('text'),
            'course_id' => $id,
        ]);

        $courseItem->save();

       return redirect(Route('courses-index', $id));
    }

    public function testStore(Request $request, int $id)
    {
        $courseItemTest = new CourseItemTest([
            'test_name' => $request->get('test_name'),
            'course_id' => $id,
        ]);

        $courseItemTest->save();
    }
}
