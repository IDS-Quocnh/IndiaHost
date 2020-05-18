@extends('layouts.atllayout', ['title' => isset($physicalHost) ? 'Edit Physical Host' : 'Add Physical Host' , 'menukey' => 'physicalHost'])
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
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" {{ isset($physicalHost) ? 'action=' . route('physical-host/edit') :'action=' . route('physical-host/add')  }} style="display: flex">
                        {{ csrf_field() }}
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('host_name') ? ' has-error' : '' }}">
                                <label for="host_name" class="col-md-4 control-label">Host name</label>

                                <div class="col-md-8">
                                    <input id="host_name" type="text" class="form-control" name="host_name" value="{{isset($physicalHost) ? $physicalHost->host_name : ''}}"  required>

                                    @if ($errors->has('host_name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('host_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('power_status') ? ' has-error' : '' }}">
                                <label for="power_status" class="col-md-4 control-label">Power status</label>

                                <div class="col-md-8">
                                    <input id="id" type="hidden" class="form-control" name="id" value="{{isset($physicalHost) ? $physicalHost->id : ''}}" required autofocus>
                                    <input id="power_status" type="text" class="form-control" name="power_status" value="{{isset($physicalHost) ? $physicalHost->power_status : ''}}" required autofocus>

                                    @if ($errors->has('power_status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('power_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('network_status') ? ' has-error' : '' }}">
                                <label for="network_status" class="col-md-4 control-label">Network status</label>

                                <div class="col-md-8">
                                    <input id="network_status" type="text" class="form-control" name="network_status" value="{{isset($physicalHost) ? $physicalHost->network_status : ''}}"  required>

                                    @if ($errors->has('network_status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('network_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hostInfo') ? ' has-error' : '' }}">
                                <label for="host_info" class="col-md-4 control-label">Host info</label>

                                <div class="col-md-8">
                                    <input id="host_info" type="text" class="form-control" name="host_info" value="{{isset($physicalHost) ? $physicalHost->host_info : ''}}"  required>

                                    @if ($errors->has('host_info'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('host_info') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('host_id') ? ' has-error' : '' }}">
                                <label for="host_id" class="col-md-4 control-label">Host ID </label>

                                <div class="col-md-8">
                                    <input id="host_id" type="text" class="form-control" name="host_id" value="{{isset($physicalHost) ? $physicalHost->host_id : ''}}" required>

                                    @if ($errors->has('host_id'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('host_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ipAddress') ? ' has-error' : '' }}">
                                <label for="ip_address" class="col-md-4 control-label">Ip Address</label>

                                <div class="col-md-8">
                                    <input id="ip_address" type="text" class="form-control" name="ip_address" value="{{isset($physicalHost) ? $physicalHost->ip_address : ''}}" required>

                                    @if ($errors->has('ip_address'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ip_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('uptime') ? ' has-error' : '' }}">
                                <label for="host_username" class="col-md-4 control-label">User name</label>

                                <div class="col-md-8">
                                    <input id="host_username" type="text" class="form-control" name="host_username" value="{{isset($physicalHost) ? $physicalHost->host_username : ''}}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('hostUrl') ? ' has-error' : '' }}">
                                <label for="host_url" class="col-md-4 control-label">Host URL</label>

                                <div class="col-md-8">
                                    <input id="host_url" type="text" class="form-control" name="host_url" value="{{isset($physicalHost) ? $physicalHost->host_url : ''}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{isset($physicalHost) ? 'Edit submit' : 'Add'}}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        <label for="datacenter" class="col-md-4 control-label">Data Center</label>
                            <div class="col-md-8">

                                <select id="datacenter" class="form-control form-control-sm" name="datacenter" value="{{isset($physicalHost) ? $physicalHost->datacenter : ''}}" required style="height: 35px">
                                    @php ($i = 0)
                                    @foreach ($dataCenterList as $dataCenterItem)
                                    @php ($i = $i+1)
                                    <option value="{{$dataCenterItem->id}}"
                                    @if (isset($physicalHost) && $dataCenterItem->id == $physicalHost->datacenter)
                                        selected
                                    @endif
                                    >{{$dataCenterItem->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('datacenter'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('datacenter') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('host_status') ? ' has-error' : '' }}">
                                <label for="host_status" class="col-md-4 control-label">Host status</label>

                                <div class="col-md-8">
                                    <input id="host_status" type="text" class="form-control" name="host_status" value="{{isset($physicalHost) ? $physicalHost->host_status : ''}}" required>

                                    @if ($errors->has('host_status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('host_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('template') ? ' has-error' : '' }}">
                                <label for="template" class="col-md-4 control-label">Template</label>

                                <div class="col-md-8">
                                    <input id="template" type="text" class="form-control" name="template" value="{{isset($physicalHost) ? $physicalHost->template : ''}}" required>

                                    @if ($errors->has('template'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('template') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('serverHealth') ? ' has-error' : '' }}">
                                <label for="server_health" class="col-md-4 control-label">Server health</label>

                                <div class="col-md-8">
                                    <input id="server_health" type="text" class="form-control" name="server_health" value="{{isset($physicalHost) ? $physicalHost->server_health : ''}}" required>
                                    @if ($errors->has('server_health'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('server_health') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('saltVersion') ? ' has-error' : '' }}">
                                <label for="salt_version" class="col-md-4 control-label">Salt version</label>

                                <div class="col-md-8">
                                    <input id="salt_version" type="text" class="form-control" name="salt_version" value="{{isset($physicalHost) ? $physicalHost->salt_version : ''}}" required>

                                    @if ($errors->has('salt_version'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('salt_version') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('os') ? ' has-error' : '' }}">
                                <label for="os" class="col-md-4 control-label">OS</label>

                                <div class="col-md-8">
                                    <input id="os" type="text" class="form-control" name="os" value="{{isset($physicalHost) ? $physicalHost->os : ''}}" required>

                                    @if ($errors->has('os'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('os') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('host_password') ? ' has-error' : '' }}">
                                <label for="host_password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-8">
                                    <input id="host_password" type="text" class="form-control" name="host_password" value="{{isset($physicalHost) ? $physicalHost->host_password : ''}}"  required>
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
