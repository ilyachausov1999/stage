<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseItems;

class CourseItemsController extends Controller
{
    public function index()
    {
        $courseItems = CourseItems::all();
        return view('CourseItems.content', compact('courseItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'text' => 'required',
        ]);

        $courceItem = new CourseItems([
            'description' => $request->get('description'),
            'text' => $request->get('text'),
            'course_id' => $request->get('course_id'),
        ]);

        $courceItem->save();

        return redirect('/content');

    }

}
