<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseItems;
use Illuminate\Routing\Route;

class CourseItemsController extends Controller
{
    public function index(int $id)
    {
        $courseItems = CourseItems::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/content-blocks',['courseItems' => $courseItems, 'id' => $id ] );
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

}
