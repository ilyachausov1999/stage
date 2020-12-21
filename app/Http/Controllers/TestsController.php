<?php


namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Questions;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController
{
    public function test(int $id)
    {
        $courseItemTest = Tests::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/test-block',['courseItemTest' => $courseItemTest, 'id' => $id ]);
    }

    public function testStore(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $courseItemTest = new Tests([
                'name' => $request->get('name'),
                'course_id' => $id,
            ]);
            $courseItemTest->save();

            $questionsData = new Questions([
                'question' => $request->get('question'),
                'test_id' => $courseItemTest->getAttribute('id')
            ]);
            $questionsData->save();

            if($request->get('is_correct') == 'on')
            {
                $is_correct[] = true;
            }
            else $is_correct[] = false;

//            $answersData = new Answers([
//                'answer' => $request->get('answer'),
//                'is_correct' => $is_correct,
//                'question_id' => $questionsData->getAttribute('id')
//            ]);
//            $answersData->save();

            $answers[] = new Answers([
                'answer' => $request->get('answer'),
                'is_correct' => $is_correct,
                'question_id' => $questionsData->getAttribute('id')
            ]);

            $question = Answers::find(1);
            $answers = $question->answers;

//            $questions = new Questions();
//            $questions->tests()->saveMany($answers);


//            $answerData->save();

//            $questionsData = Questions::class;
//            $questionsData->tests()->saveMany([
//                new Answers([
//                    'answer' => $request->get('answer'),
//                    'is_correct' => $is_correct,
//                    'question_id' => $questionsData->getAttribute('id')])
//            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect(Route('courses-test', $id));
    }
}
