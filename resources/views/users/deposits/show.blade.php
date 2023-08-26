@extends('layouts.app')


@section('content')

<div class="card mt-3">
    <div class="card-header">

        <h5 class="card-title">Deposit Request</h5>
    </div>
    <div class="card-body">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>UUID:</strong>
                        {{ $Deposit->uuid}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Amount:</strong>
                        {{ $Deposit->amount }}
                        {{ $Deposit->currency }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>url:</strong>
                        {{ $Deposit->token }}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $Deposit->status }}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection