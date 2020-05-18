@extends('layouts.atllayout', ['title' => isset($dataCenter) ? 'Edit Data Center' : 'Add Data Center'  , 'menukey' => 'dataCenter'])

@section('content')
<div class="card">
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

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" {{ isset($dataCenter) ? 'action=' . route('datacenter/edit') :'action=' . route('datacenter/add')  }} >
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{isset($dataCenter) ? $dataCenter->id : ''}}" required autofocus>
                                <input id="name" type="text" class="form-control" name="name" value="{{isset($dataCenter) ? $dataCenter->name : ''}}" required autofocus>

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
                                <input id="location" type="text" class="form-control" name="location" value="{{isset($dataCenter) ? $dataCenter->location : ''}}"  required>

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
                                <input id="number" type="number" class="form-control" name="number"  value="{{isset($dataCenter) ? $dataCenter->number : ''}}"  required>

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="provisioning_uri" class="col-md-4 control-label">Provisioning URI</label>

                            <div class="col-md-6">
                                <input id="provisioning_uri" type="url" class="form-control" name="provisioning_uri" value="{{isset($dataCenter) ? $dataCenter->provisioning_uri : ''}}"  required>

                                @if ($errors->has('provisioning_uri'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('provisioning_uri') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="pxeServer" class="col-md-4 control-label">PXE server</label>

                            <div class="col-md-6">
                                <input id="pxe_server" type="text" class="form-control" name="pxe_server" value="{{isset($dataCenter) ? $dataCenter->pxe_server : ''}}"   required>

                                @if ($errors->has('pxeServer'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('pxe_server') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="rack" class="col-md-4 control-label">RACK</label>

                            <div class="col-md-6">
                                <input id="rack" type="number" class="form-control" name="rack" value="{{isset($dataCenter) ? $dataCenter->rack : ''}}" required>

                                @if ($errors->has('rack'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('rack') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{isset($dataCenter) ? 'Edit submit' : 'Add'}}
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
