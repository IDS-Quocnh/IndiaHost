@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: arial;">Please put a code sent to +{{$number_phone}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="row" style="padding-top : 15px">
                                    <div class="col-sm-4">
                                        <label for="verify" style="padding-top : 8px" class="col-md-12 control-label">Verify Code</label>
                                    </div>

                                    <div class="col-sm-8">
                                         <input id="code" type="number" class="form-control" name="code" required>
                                    </div>
                                </div>
                                <input id="username" type="hidden" class="form-control" name="username" value="{{ $username }}" required autofocus>
                                <input id="verify" type="hidden" class="form-control" name="verify" value="login" required autofocus>
                                <input id="password" type="hidden" class="form-control" name="password" value="{{ $password }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <center>
                                    <button type="submit" class="btn btn-primary">
                                        Verify
                                    </button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
