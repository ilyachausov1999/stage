<?php

namespace App\Http\Controllers;

use App\Traits\RolesTrait;
use Illuminate\Http\Request;
use App\Models\CourseItems;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class CourseItemsController extends Controller
{

    use RolesTrait;
    public function index(int $id)
    {
        $courseItems = CourseItems::query()->with('course')->where('course_id', $id)->get();
        return view('admin/content-blocks', ['courseItems' => $courseItems, 'id' => $id, 'role' => $this->getRole()]);
    }

    public function store(Request $request, int $id)
    {
        $request->validate([
            'description'   => 'required|string|max:255',
            'text'          => 'required|text',
            'image'         =>  'image|max:2048'
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

            return redirect(Route('admin.courses-index', $id));
        }else{
            $courseItem = new CourseItems([
                'description' => $request->get('description'),
                'text' => $request->get('text'),
                'course_id' => $id,
            ]);

            $courseItem->save();

            return redirect(Route('admin.courses-index', $id));
        }
    }
}
