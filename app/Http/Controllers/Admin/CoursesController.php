<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCoursesRequest;
use App\Models\Courses;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoursesController extends Controller
{
    use ValidatesRequests;

    public function create()
    {
        return view('admin.createCourse');
    }

    public function submit(createCoursesRequest $req)
    {
        $req->validate([
            'name'     =>  'required|string|min:1|max:255',
            'image'         =>  'required|image|max:2048'
        ]);

        /**
         * @var UploadedFile $image
         */
        if ($image = $req->file('image')) {
           // $resizedImage = Courses::make($image->getRealPath())->resize(200, 200)->save($path);
            $path = Storage::put('', $image);

            Courses::query()->create([
                'name'    =>   $req->name,
                'image'   =>   $path
            ]);

            return redirect()->route('courses-all');
        }
    }

    public function getAll()
    {
        /**
         * @todo rodia сделай пагинацию
         */
        $course = Courses::simplePaginate(999);
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
        $file = $req->hidden_image;
        $image = $req->file('image');
        if ($image != '') {
            $req->validate([
                'name'   =>  'required',
                'image'  =>  'image|max:2048'
            ]);

            $path = Storage::put('', $image);
        } else {
            $req->validate([
                'name'   =>  'required',
            ]);
        }
        $data = array(
            'name'       =>   $req->name,
            'image'      =>   $path
        );
        Courses::whereId($id)->update($data);
        return redirect()->route('courses-all');
    }
}
