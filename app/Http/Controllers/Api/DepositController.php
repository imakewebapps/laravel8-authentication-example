<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use App\Models\Deposit;
use Illuminate\Support\Str;

class DepositController extends Controller
{
    //

    public function depositCreate(Request $request, $code=200){

        $request->validate([
            'key' => 'required',
            'amount'=>'required|numeric|between:0,100000',
            'currency'=>'required|in:USD,TR',
            'successredirect'=>'required|url:http,https',
            'failredirect'=>'required|url:http,https',
            'callbackurl'=>'required|url:http,https',
        ]);

         $user = User::where('key',$request->key) -> first();
         if(!$user){
            return response()->json(["message"=>"invalid details.", "code"=>"201"], 400);
        }

         $data = $request->all();
         $data['user_id']= $user->id;
         $data['mode']= "manual";
        //  $data['token']= Str::random(64);

        $Deposit = Deposit::create($data);
        $op = [ "code"=>200,
                "message"=>"Payment link created",
                "redirect"=>url('/payments/'.$Deposit->token),
                "uuid"=>$Deposit->uuid];


        return response()->json($op, $code);
    }

    public function depositStatus(Request $request, $code=200){

        $request->validate([
            'key' => 'required',
            'uuid'=>'required',

        ]);

        $user = User::where('key',$request->key) -> first();
        if(!$user){
            $code = 400;
            $op = ["message"=>"invalid details.", "code"=>"201"];
        }

         $data = $request->all();
         $data['user_id']= $user->id;
         $deposit = Deposit::where('uuid',$request->uuid) -> first();


        if(!$deposit){
            $code = 400;
            $op = ["message"=>"invalid details." ,"code"=>"202"];
        }
        else{
            $op = ["code"=>$code,"uuid"=>$deposit->uuid,"status"=>$deposit->status];

        }


        return response()->json($op, $code);
    }



}
