<?php


namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Tests;
use Illuminate\Http\Request;
use App\Models\CourseItemTest;
use Illuminate\Support\Facades\DB;

class CourseTestController
{
    public function test(int $id)
    {
        $courseItemTest = CourseItemTest::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/test-block',['courseItemTest' => $courseItemTest, 'id' => $id ]);
    }

    public function testStore(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $courseItemTest = new CourseItemTest([
                'name' => $request->get('name'),
                'course_id' => $id,
            ]);

            $courseItemTest->save();

            $questionsData = new Tests([
                'question' => $request->get('questions'),
                'test_id' => $courseItemTest->getAttribute('id')
            ]);
            $questionsData->save();

            $answersData = new Answers([
                'answer' => $request->get('answers'),
                'is_correct' => true,
                'question_id' => $questionsData->getAttribute('id')
            ]);
            $answersData->save();


//            $questionsData = Tests::query()->
//            $questionsData->comments()->saveMany([
//                'questions' => $request->get('name')
//            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect(Route('courses-test', $id));
    }
}
