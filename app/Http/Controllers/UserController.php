<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    // 

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::orderBy('date_created', 'DESC')->get();
        return view('Users.index')->with(['utilisateurs' => $users]);
    }

    public function create() {

        return view('Users.add');
    }
}



