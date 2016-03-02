<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 5:04 PM
 */

namespace App\Http\Controllers;


use App\Http\Middleware\LockDownloadCert;
use App\Models\Question;
use App\Models\User;
use App\Pdf\Pdf;
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
        $questions = $question->getAll();
        $rightAnsweredCount = $this->checkAnswers($questions, $answers);

        $totalCount = count($questions);
//        $rightAnsweredCount = count($rightAnswered);

        if ($totalCount == $rightAnsweredCount) {
            $user->setSuccess();
            $user->setQuestionAnswered(true);
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

            if ($questions[$key]['right_answer'] == $answer) {
                $rightAnswered++;
            }
        }

        return $rightAnswered;
    }

    public function downloadCertificate(Pdf $pdf, User $user)
    {
        return $pdf->create($user->getFirstName() . ' ' . $user->getLastName());
    }
}
