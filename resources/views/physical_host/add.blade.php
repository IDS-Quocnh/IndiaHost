@extends('layouts.atllayout', ['title' => 'Register New Physical Host', 'menukey' => 'physicalHost'])
@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Add New Physical Host
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
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('physical-host/add') }}" style="display: flex">
                        {{ csrf_field() }}

                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('hostName') ? ' has-error' : '' }}">
                                <label for="hostName" class="col-md-4 control-label">Host name</label>

                                <div class="col-md-8">
                                    <input id="hostName" type="text" class="form-control" name="hostName" required>

                                    @if ($errors->has('hostName'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('hostName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('powerStatus') ? ' has-error' : '' }}">
                                <label for="powerStatus" class="col-md-4 control-label">Power status</label>

                                <div class="col-md-8">
                                    <input id="powerStatus" type="text" class="form-control" name="powerStatus" required autofocus>

                                    @if ($errors->has('powerStatus'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('powerStatus') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('networkStatus') ? ' has-error' : '' }}">
                                <label for="networkStatus" class="col-md-4 control-label">Network status</label>

                                <div class="col-md-8">
                                    <input id="networkStatus" type="text" class="form-control" name="networkStatus" required>

                                    @if ($errors->has('networkStatus'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('networkStatus') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hostInfo') ? ' has-error' : '' }}">
                                <label for="hostInfo" class="col-md-4 control-label">Host info</label>

                                <div class="col-md-8">
                                    <input id="hostInfo" type="text" class="form-control" name="hostInfo" required>

                                    @if ($errors->has('hostInfo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hostInfo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hostId') ? ' has-error' : '' }}">
                                <label for="hostId" class="col-md-4 control-label">Host ID </label>

                                <div class="col-md-8">
                                    <input id="hostId" type="text" class="form-control" name="hostId" required>

                                    @if ($errors->has('hostId'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('hostId') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ipAddress') ? ' has-error' : '' }}">
                                <label for="ipAddress" class="col-md-4 control-label">Ip Address</label>

                                <div class="col-md-8">
                                    <input id="ipAddress" type="text" class="form-control" name="ipAddress" required>

                                    @if ($errors->has('ipAddress'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ipAddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('hostStatus') ? ' has-error' : '' }}">
                                <label for="hostStatus" class="col-md-4 control-label">Host status</label>

                                <div class="col-md-8">
                                    <input id="hostStatus" type="text" class="form-control" name="hostStatus" required>

                                    @if ($errors->has('hostStatus'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('hostStatus') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('template') ? ' has-error' : '' }}">
                                <label for="template" class="col-md-4 control-label">Template</label>

                                <div class="col-md-8">
                                    <input id="template" type="text" class="form-control" name="template" required>

                                    @if ($errors->has('template'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('template') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('serverHealth') ? ' has-error' : '' }}">
                                <label for="serverHealth" class="col-md-4 control-label">Server health</label>

                                <div class="col-md-8">
                                    <input id="serverHealth" type="text" class="form-control" name="serverHealth" required>
                                    @if ($errors->has('serverHealth'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('serverHealth') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('saltVersion') ? ' has-error' : '' }}">
                                <label for="saltVersion" class="col-md-4 control-label">Salt version</label>

                                <div class="col-md-8">
                                    <input id="saltVersion" type="text" class="form-control" name="saltVersion" required>

                                    @if ($errors->has('saltVersion'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('saltVersion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('os') ? ' has-error' : '' }}">
                                <label for="os" class="col-md-4 control-label">OS</label>

                                <div class="col-md-8">
                                    <input id="os" type="text" class="form-control" name="os" required>

                                    @if ($errors->has('os'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('os') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('uptime') ? ' has-error' : '' }}">
                                <label for="uptime" class="col-md-4 control-label">Up time</label>

                                <div class="col-md-8">
                                    <input id="uptime" type="datetime-local" class="form-control" name="uptime" required>

                                    @if ($errors->has('uptime'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('uptime') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
