<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests;

class UserController extends Controller
{
    public function postLogin(Request $request)
    {
        $method = $request->get('method', '');
        if ($method === 'printLogin')
            return $this->printLogin();

        if (\Auth::attempt(['name' => $request->name, 'password' => $request->password])) {

            return \Redirect::action('CoursesController@index');
        }
        return \Redirect::back()->with('message','Ошибка авторизации. Попробуйте ещё раз.');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    private function printLogin() {
        return "postLogin";
    }
}
