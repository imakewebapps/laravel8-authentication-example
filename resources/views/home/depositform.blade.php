@extends('layouts.auth')

@section('content')
<div class="cardpanel-primary">
      <div class="panel-heading"><h2>Deposit Details Form</h2></div>
      <div class="panel-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
        @endif



        <form action="{{ route('deposit.form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title or Full Name" required="required" autofocus>
                    <label for="floatingName">Title / Name</label>
                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>


                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="username" value="{{ old('details') }}" placeholder="Details" required="required" autofocus>
                    <label for="floatingName">Details</label>
                    @if ($errors->has('details'))
                        <span class="text-danger text-left">{{ $errors->first('details') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="username" value="{{ old('note') }}" placeholder="Note"  autofocus>
                    <label for="floatingName">Note</label>
                    @if ($errors->has('note'))
                        <span class="text-danger text-left">{{ $errors->first('note') }}</span>
                    @endif
                </div>




                <div class="form-group form-floating mb-3">
                    @if ($errors->has('image'))
                    <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                @endif

                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group form-floating mb-3">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
        </form>

      </div>
    </div>
@endsection
