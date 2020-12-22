<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseItems;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class CourseItemsController extends Controller
{
    public function index(int $id)
    {
        $courseItems = CourseItems::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/content-blocks', ['courseItems' => $courseItems, 'id' => $id]);
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'description'   => 'required',
            'text'          => 'required',
            'image'         =>  'required|image|max:2048'
        ]);
        /**
         * @var UploadedFile $image
         */
        if ($image = $request->file('image')) {
            $path = Storage::put('', $image);
            $courseItem = new CourseItems([
                'description' => $request->get('description'),
                'text' => $request->get('text'),
                'course_id' => $id,
                'image'   =>   $path
            ]);

            $courseItem->save();

            return redirect(Route('courses-index', $id));
        }
    }
}
