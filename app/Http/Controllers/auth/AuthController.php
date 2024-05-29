<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Show login form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show registration form
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Handle login request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withError('Opps! You have entered invalid credentials');
    }

    /**
     * Handle registration request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have Successfully registered');
    }

    /**
     * Show dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboards.dashboard');
        }

        return redirect("login")->withError('Opps! You do not have access');
    }

    /**
     * Create a new user
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'role' => 'client', // Role is set to client
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle logout request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
