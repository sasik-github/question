<?php
/**
 * User: sasik
 * Date: 2/29/16
 * Time: 5:04 PM
 */

namespace App\Http\Controllers;


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

    public function success(Request $request, User $user)
    {
        return view('question.questionSuccess',
            compact('user')
            );
    }
}