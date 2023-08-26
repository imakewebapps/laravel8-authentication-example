<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use App\Models\Withdrawl;
use Illuminate\Support\Str;

class WithdrawController extends Controller
{
    //

    public function withdrawRequest(Request $request, $code=200){

        $request->validate([
            'key' => 'required|exists:users,key',
            'amount'=>'required|numeric|between:0,100000',
            'name'=> 'required',
            'details'=>'required',
            'currency'=>'required|in:USD',
            'callbackurl'=>'required|url:http,https',
        ]);

         $user = User::where('key',$request->key) -> first();

         $data = $request->all();
         $data['user_id']= $user->id;
         $data['mode']= "bank";
        $Withdrawl = Withdrawl::create($data);
        $op = ["code"=>200,"message"=>"Withdrawl Request created","uuid"=>$Withdrawl->uuid,
        ];


        return response()->json($op, $code);
    }

    public function withdrawStatus(Request $request, $code=200){

        $request->validate([
            'key' => 'required|exists:users,key',
            'uuid'=>'required|exists:withdrawls,uuid',

        ]);

         $user = User::where('key',$request->key) -> first();

         $data = $request->all();
         $data['user_id']= $user->id;
         $data['mode']= "bank";
         $withdrawl = Withdrawl::where('uuid',$request->uuid) -> first();
        $op = ["code"=>200,"uuid"=>$withdrawl->uuid,"status"=>$withdrawl->status];


        return response()->json($op, $code);
    }
}
