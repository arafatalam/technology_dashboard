<?php

class LoginController extends BaseController {

    public function showLogin()
    {
        return View::make('tech_dashboard.pages.user.login');
    }
    public function doLogin(){


        $userName = Input::get('username');
        $password = Input::get('password');

        if (Auth::attempt(array('user_name' => $userName, 'password' => $password)))
        {
            $result = DB::table('users')->where('user_name', $userName)->first();

            Session::put('USER_NAME', $result->user_name);
            Session::put('EMPLOYEE_ID', $result->emp_id);
            Session::put('USER_ID', $result->id);

            return Redirect::Route('landing');
        }
        else
        {

            return Redirect::Route('login')->with('message', 'Employee Id or Password Does Not Match');
        }
    }

    public function doLogout(){


        //Log::info(Session::get('USER_NAME'). ' Logged Out');
        Session::flush();
        return Redirect::Route('login');
    }

}
