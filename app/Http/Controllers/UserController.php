<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        return view('users.index')->with('users',$users);
    }

    public function view($id)
    {

    }

    public function delete($id)
    {
       
        $delete = $this->user->find($id)->delete();

        return redirect('users');
    }
}
