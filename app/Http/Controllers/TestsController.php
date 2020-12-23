<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreateTestRequest;
use App\Models\Answers;
use App\Models\Questions;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Test;

class TestsController
{


    public function testIndex(int $id)
    {
        $courseItemTest = Tests::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/allTests', ['courseItemTest' => $courseItemTest, 'id' => $id]);
    }

    public function show($id)
    {

        $test = Tests::find($id);
        $questions = new Questions();
        $answers = new Answers();
        $question_id = $questions::query()->with('answers')->where('test_id', $id)->get();
        foreach ($question_id as $question)
        {
            $questionId[] = $question['id'];
            foreach ($questionId as $item) {
                $answer_id = $answers::query()->where('question_id', $item)->get();

            }

//            foreach ($answer_id as $value)
//            {
//                $ansArr[] = $value->answer;
//            }
        }
          //массив с ответами для конкретного вопроса
        return view('admin/courses/showTest', ['test' => $test, 'id' => $id, 'question_id' => $question_id, 'answer_id' => $answer_id ]);
    }

    public function testEdit($id)
    {
        $test = Tests::find($id);
        return view('admin/courses/testEdit', ['test' => $test, 'id' => $id, ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

        ]);

        $test = Tests::find($id);
        $test->name = $request->get('name');

        $test->save();
        return redirect(Route('courses-testIndex'))->with('success', 'Тест обновлён!');
    }


    public function destroy($id)
    {

        $question = new Questions();
        $question_id = $question::query()->with('answers')->where('test_id', $id)->get('id');

        foreach ($question_id as $item) {
            $questionFind = $question::findOrFail($item->id);
            $questionFind->answers()->delete();
            $questionFind->delete();
        }

        $test = Tests::find($id);

        $test->delete();

        return redirect(Route('courses-testIndex', $test->course_id))->with('success', 'Тест удалён');
    }

    public function test(int $id)
    {
        $courseItemTest = Tests::query()->with('course')->where('course_id', $id)->get();
        return view('admin/courses/test-block', ['courseItemTest' => $courseItemTest, 'id' => $id]);
    }

    public function testStore(CreateTestRequest $request, int $id)
    {
        $questionsData = $request->get('questions');

        DB::beginTransaction();

        try {
            $test = new Tests([
                'name' => $request->get('name'),
                'course_id' => $id,
            ]);
            $test->save();

            foreach ($questionsData as $questionItem) {
                if (!isset($questionItem['name'])) {
                    continue;
                }
                $answersData = $questionItem['answers'];
                /**
                 * @var Questions $question
                 */
                /**
                 * @var UploadedFile $image
                 */
                if ($image = $request->file('image')) {
                    $path = Storage::put('', $image);
                    $question = $test
                        ->questions()
                        ->create(
                            [
                                'question' => $questionItem['name'],
                                'image'   =>   $path
                            ]
                        );
                } else {
                    $question = $test
                        ->questions()
                        ->create(
                            [
                                'question' => $questionItem['name'],
                            ]
                        );
                }
                $preparedAnswerData = array_map(function ($value) {
                    $isCorrect = isset($value['is_correct']) && $value['is_correct'] === 'on';
                    return ['answer' => $value['answer'], 'is_correct' => $isCorrect];
                }, $answersData);

                if (count($preparedAnswerData)) {
                    $question->answers()->createMany($preparedAnswerData);
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect(Route('courses-testIndex', $id));
    }
}
