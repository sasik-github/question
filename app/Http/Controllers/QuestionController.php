<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 5:04 PM
 */

namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends Controller
{

    public function index(User $user)
    {
        return view('question.questionIndex',
            compact('user')
            );
    }

    public function getAllQuestions(Question $question)
    {
        return $question->getAll();
    }

    public function success(Request $request, User $user, Question $question)
    {
        $answers = $request->get('answers', []);
        var_dump($answers);
        $questions = $question->getAll();
        $rightAnsweredCount = $this->checkAnswers($questions, $answers);

        $totalCount = count($questions);
//        $rightAnsweredCount = count($rightAnswered);

        if ($totalCount == $rightAnsweredCount) {
            return view('question.questionSuccess');
        } else {
            return view('question.questionFailure',
                compact('totalCount', 'rightAnsweredCount')
            );
        }
    }

    /**
     * @param $questions
     * @param $answers
     * @return int
     */
    private function checkAnswers($questions, $answers) {

        $rightAnswered = 0;
//        var_dump([
//            $questions,
//            $answers
//        ]);

        foreach ($answers as $key => $answer) {

            var_dump([$questions[$key]['right_answer'], $answer, $questions[$key]['right_answer'] == $answer]);

            if ($questions[$key]['right_answer'] == $answer) {
                $rightAnswered++;
            }
        }

        return $rightAnswered;
    }
}