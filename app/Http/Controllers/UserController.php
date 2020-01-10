<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->where('id','!=',Auth::user()->id)->get();

        return view('users.index')->with('users',$users);
    }

    public function profile()
    {
       $user = $this->user->with('articles')->where('id',Auth::user()->id)->first();
       return view('users.profile')->with('user',$user);
    }

    public function delete($id)
    {
       
        $delete = $this->user->find($id)->delete();

        return redirect('users');
    }
}
