<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createCoursesRequest;
use App\Models\Courses;
use App\Traits\RolesTrait;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class CoursesController extends Controller
{
    use ValidatesRequests;
    use RolesTrait;

    public function create()
    {
        return view('admin.createCourse', ['role' => $this->getRole()]);
    }

    public function submit(createCoursesRequest $req)
    {
        $req->validate([
            'name'     =>  'required|string|min:1|max:255',
            'image'    =>  'image|max:2048'
        ]);
        /**
         * @var UploadedFile $image
         */
        if ($image = $req->file('image')) {
            $path = Storage::put('', $image);

            Courses::query()->create([
                'name'    =>   $req->name,
                'image'   =>   $path
            ]);

            return redirect()->route('admin.courses-all');
        } else {
            Courses::query()->create([
                'name'    =>   $req->name
            ]);
        }
        return redirect()->route('admin.courses-all');
    }

    public function getAll()
    {

        $course = Courses::paginate(5);

        return view('admin.viewCourses', ['course' => $course, 'role' => $this->getRole()]);
    }

    public function edit($id)
    {
        $course = Courses::find($id);

        return view('admin.editCourse', ['data' => $course, 'role' => $this->getRole(), 'image' => storage_path('app/' . $course['image'])]);
    }

    public function delete($id)
    {
        Courses::find($id)->delete();
        return redirect()->route('admin.courses-all');
    }

    public function view($id)
    {
        $course = new Courses;
        return view('admin.courses.view', ['data' => $course->find($id), 'role' => $this->getRole()]);
    }

    public function update(createCoursesRequest $req, $id)
    {
        $req->validate([
            'name'   =>  'required',
            'image'  =>  'image|max:2048'
        ]);

        /**
         * @var UploadedFile $image
         */

        if ($image = $req->file('image')) {
            $path = Storage::put('', $image);
            $data = array(
                'name'       =>   $req->name,
                'image'      =>   $path
            );
            Courses::whereId($id)->update($data);
            return redirect()->route('admin.courses-all');
        } else {
            $data = array(
                'name'       =>   $req->name,
            );
            Courses::whereId($id)->update($data);
        }
        return redirect()->route('admin.courses-all');
    }
}
