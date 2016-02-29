<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Question $question, User $user)
    {

//        var_dump($question->getAll());
//        var_dump($request->getClientIp());

        return view('home.homeIndex',
            compact('user')
            );
    }

    public function login(Request $request, User $user)
    {

        $this->validate($request, $user::$rules);

        $attributes = $request->all();
        $attributes['ip_address'] = $request->getClientIp();

        $user->fill($attributes);

        return redirect()
            ->action('QuestionController@index');

    }
}
