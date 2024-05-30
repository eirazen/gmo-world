<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function index()
    {

        return view('index');
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:2|max:25',
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            // dd($request['name']);
            $user = User::create(['name' => $request['name']]);
            if ($user) {
                Auth::login($user);
                // dd(Auth::user());
                return redirect()->route('gamestart');
            }
        }
    }

    public function home()
    {

        return view('gamestart');
    }

    public function home2()
    {
        $user = User::find(Auth::id());
        if ($user->level_1) {
            if (!$user->level_2) {
                return view('gamestart2');
            } else {
                return redirect('/gamestart3');
            }
        } else {
            return redirect('/logout');
        }
    }
    public function storeScore2($level = 2, $score = 10)
    {
        $redirect = $this->storeScores($level, $score, 'success');
        return redirect($redirect);
    }

    public function storeScores($level, $score, $type)
    {
        $user = User::find(Auth::id());
        if ($level == 1) {
            $user->level_1 = $score;
            $goto = '/gamestart2';
        } else if ($level == 2) {
            $user->level_2 = $score;
            $goto = '/gamestart3';
            if ($user->save()) {
                return $goto;
            } else {
                return '/gamestart2';
            }
        } else {
            $user->level_3 = $score;
            $goto = '/logout';
        }
        $user->save();
        if ($type == 'fail') {
            $data = ['goto' => '/logout'];
        } else {
            $data = ['goto' => $goto];
        }
        return json_encode($data);
    }

    public function home3()
    {
        $user = User::find(Auth::id());
        if ($user->level_2) {
            return view('gamestart3');
        } else {
            return redirect()->route('gamestart2');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function leaderboards()
    {

        $users = User::orWhereNotNull('level_1')
            ->orWhereNotNull('level_2')
            ->orWhereNotNull('level_3')
            ->orderBy('level_1', 'desc')
            ->orderBy('level_2', 'desc')
            ->orderBy('level_3', 'desc')
            ->orderBy('name', 'asc')
            ->paginate(10);
        return view('leaderboards', compact('users'));
    }
}
