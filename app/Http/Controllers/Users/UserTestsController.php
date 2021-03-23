<?php


namespace App\Http\Controllers\Users;


use App\Models\Answer;
use App\Models\Courses;
use App\Models\Question;
use App\Models\Test;
use App\Traits\RolesTrait;
use Illuminate\Http\Request;

class UserTestsController
{
    use RolesTrait;
    public function show($id)
    {
        $courseItemTest = Test::query()->with('courses')->where('course_id', $id)->get();
        return view('user/showTests', ['courseItemTest' => $courseItemTest, 'id' => $id, 'role' => $this->getRole()]);
    }

    public function passTest($id)
    {
        $test = Test::with(['questions.answers'])->find($id);
        return view('user/passTest', ['test' => $test, 'role' => $this->getRole()]);
    }

    public function testResult(Request $request, $id)
    {

        $test = Test::with(['questions.answers'])->find($id);

        $questions = $test->questions;
        foreach ($questions as $question) {
            $questionId = $question['id'];
//            $request->validate([
//                'questions-'.$questionId => 'required',
//            ]);
            $answers = $question->answers;
            foreach ($answers as $answer)
            {
                $answerId = $answer['id'];
//                $request->validate([
//                    'answers-'.$answerId => 'required',
//                ]);
                $isCorrect = $request->get('is_correct-' . $answerId);
//                dd($isCorrect);
//                dd($request->all());
                if ($isCorrect === 1 or $isCorrect === 'on')
                {
                    $isCorrect1 = 1;

                } else {
                    $isCorrect1 = 0;
                }
                $is_corr = Answer::find($answerId)->get('is_correct');
                if($is_corr == $isCorrect)
                {
                    dd($isCorrect,$is_corr);
                }else{
                    dd($isCorrect,$is_corr);
                }
            }
        }
        return redirect(Route('custom-pass', $test->course_id))->with('success', 'Тест пройден!');
    }
}
