@extends('layouts.app')


@section('content')




<div class="card mt-3">
    <div class="card-header">
        Deposit Requests Management
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <tr>
              <th>No</th>
              <th>UUID</th>
              <th>Amount</th>
              <th>Status</th>
              <th width="280px">Action</th>
            </tr>
            @foreach ($Deposits as $key => $deposit)
             <tr>
               <td>{{ ++$i }}</td>
               <td>{{ $deposit->uuid }}</td>
               <td>{{ $deposit->amount." ".$deposit->currency }}</td>
               <td>{{ $deposit->status}}</td>

               <td>
                <a class="btn btn-warning" href="{{ route('deposits.show',$deposit->id) }}">Details</a>
                @if($deposit->status == "pending")
                <a class="btn btn-info" href="{{ route('deposit.approve',$deposit->id) }}">Approve</a>
                <a class="btn btn-danger" href="{{ route('deposit.reject',$deposit->id) }}">Reject</a>
                @endif
               </td>
             </tr>
            @endforeach
           </table>


           {!! $Deposits->render() !!}
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

    </div>
</div>




@endsection