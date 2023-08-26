<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:Deposit-list|Deposit-create|Deposit-edit|Deposit-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:Deposit-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:Deposit-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:Deposit-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Deposits = Deposit::where('user_id',auth()->id())->orderBy('created_at','DESC')->paginate(5);
        return view('users.deposits.index',compact('Deposits'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deposit = Deposit::get();
        return view('users.deposits.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:Deposits,name',
            'permission' => 'required',
        ]);

        $Deposit = Deposit::create(['name' => $request->input('name')]);
        $Deposit->syncPermissions($request->input('permission'));

        return redirect()->route('Deposits.index')
                        ->with('success','Deposit created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Deposit = Deposit::find($id);

        return view('users.deposits.show',compact('Deposit'));
    }

    public function approve(Deposit $deposit)
    {
        if($deposit){
            $deposit->status = "success";
            $deposit->save();
        }
        return redirect()->back()->with('success', $deposit->uuid.'\'status has been changed.');
    }

    public function reject(Deposit $deposit)
    {
        if($deposit){
            $deposit->status = "reject";
            $deposit->save();
        }
        return redirect()->back()->with('success', $deposit->uuid.'\'status has been changed.');

        // $Deposit = Deposit::find($id);

        // return view('users.deposits.show',compact('Deposit'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Deposit = Deposit::find($id);

        return view('users.deposits.edit',compact('Deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $Deposit = Deposit::find($id);
        $Deposit->name = $request->input('name');
        $Deposit->save();

        $Deposit->syncPermissions($request->input('permission'));

        return redirect()->route('Deposits.index')
                        ->with('success','Deposit updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("Deposits")->where('id',$id)->delete();
        return redirect()->route('Deposits.index')
                        ->with('success','Deposit deleted successfully');
    }
}
