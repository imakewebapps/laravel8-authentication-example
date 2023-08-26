<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    //
    public function deposit(){
        return view('users.developer.deposit');
    }
    //
    public function withdraw(){
        return view('users.developer.withdraw');
    }
}
