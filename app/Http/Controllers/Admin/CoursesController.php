<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCoursesRequest;
use App\Models\Courses;
use Illuminate\Foundation\Validation\ValidatesRequests;
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
            'name'     =>  'required',
            'image'         =>  'image|max:2048'
        ]);

        if ($image = $req->file('image')) {
            $filename  = Str::random(6) . '.' . $image->getClientOriginalExtension();
            $path = public_path('/storage' . $filename);
            $resizedImage = Courses::make($image->getRealPath())->resize(200, 200)->save($path);
            Storage::put('/storage' . $filename,  $resizedImage);

            // $image = $req->file('image');
            // $file = rand() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('/storage'), $file);
            $data = array(
                'name'    =>   $req->name,
                'image'   =>   $filename
            );

            Courses::create($data);

            return redirect()->route('courses-all');
        }
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
        $file = $req->hidden_image;
        $image = $req->file('image');
        if ($image != '') {
            $req->validate([
                'name'   =>  'required',
                'image'  =>  'image|max:2048'
            ]);

            $file = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/storage'), $file);
        } else {
            $req->validate([
                'name'   =>  'required',
            ]);
        }
        $data = array(
            'name'       =>   $req->name,
            'image'      =>   $file
        );
        Courses::whereId($id)->update($data);
        return redirect()->route('courses-all');
    }
}
