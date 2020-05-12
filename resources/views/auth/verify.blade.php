@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: arial;">Please put a code sent to +{{$number_phone}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Verify Code</label>

                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control" name="code" required>
                                <input id="username" type="hidden" class="form-control" name="username" value="{{ $username }}" required autofocus>
                                <input id="verify" type="hidden" class="form-control" name="verify" value="login" required autofocus>
                                <input id="password" type="hidden" class="form-control" name="password" value="{{ $password }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Verify
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
