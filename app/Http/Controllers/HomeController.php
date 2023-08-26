<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepositDetailRequest;
use App\Models\Deposit;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function wallet(){
        $user = User::where('username','demo') -> first();

        $user->deposit(10);

        dd($user->balance);
    }

    public function depositForm($token){
        $deposit = Deposit::where("token", $token)->first();
        if(!$deposit)
        abort(401);

        dd($deposit);
        return view('home.depositform');
    }
    public function storeDepositForm(StoreDepositDetailRequest $request){
    }
}
