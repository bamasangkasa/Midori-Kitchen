<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods=Food::all();
        return view('home',compact('foods'));
    }

    //regist
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nope' => 'required|min:11',
            'nama' => 'required|min:3',
            'username' => 'required|max:255',
            'alamat' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nope'     => $data['nope'],
            'nama'     => $data['nama'],
            'username' => $data['username'],
            'alamat'   => $data['alamat'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
