@extends('layouts.atllayout', ['title' => 'Register New Data Center', 'menukey' => 'dataCenter'])
@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Add New Data Center
    </ol>
</nav>
@if(isset($susscessMessage))
<div class="alert alert-success" role="alert">
    {{$susscessMessage}}
</div>
@endif
@if(isset($dangerMessage))
<div class="alert alert-danger" role="alert">
    {{$dangerMessage}}
</div>
@endif
@if(isset($warningMessage))
<div class="alert alert-warning" role="alert">
    {{$warningMessage}}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('datacenter/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" required>

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="number" class="col-md-4 control-label">Number</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control" name="number" required>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="provisioningUri" class="col-md-4 control-label">Provisioning URI</label>

                            <div class="col-md-6">
                                <input id="provisioningUri" type="url" class="form-control" name="provisioningUri" required>

                                @if ($errors->has('provisioningUri'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('provisioningUri') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="pxeServer" class="col-md-4 control-label">PXE server</label>

                            <div class="col-md-6">
                                <input id="pxeServer" type="text" class="form-control" name="pxeServer" required>

                                @if ($errors->has('pxeServer'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('pxeServer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="rack" class="col-md-4 control-label">RACK</label>

                            <div class="col-md-6">
                                <input id="rack" type="text" class="form-control" name="rack" required>

                                @if ($errors->has('rack'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('rack') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
