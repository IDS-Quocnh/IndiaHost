@extends('layouts.atllayout', ['title' => 'Edit Server', 'menukey' => 'severSelect'])
@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Edit Server
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('select-server/edit') }}" style="display: flex">
                        {{ csrf_field() }}
                        <input id="id" type="hidden" class="form-control" name="id" value="{{$server->id}}" required>
                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('hostName') ? ' has-error' : '' }}">
                                <label for="hostName" class="col-md-4 control-label">Host name</label>

                                <div class="col-md-8">
                                    <select id="hostName" class="form-control form-control-sm" name="hostName" value="{{$server->host_name}}" required style="height: 35px">
                                        @php ($i = 0)
                                        @foreach ($physicalHostList as $physicalHostItem)
                                        @php ($i = $i+1)
                                        <option value="{{$physicalHostItem->id}}"
                                        @if ($physicalHostItem->id == $server->host_name)
                                            selected
                                        @endif
                                        >{{$physicalHostItem->host_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('hostName'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('hostName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('powerStatus') ? ' has-error' : '' }}">
                                <label for="datacenter" class="col-md-4 control-label">Datacenter</label>

                                <div class="col-md-8">
                                    <select id="datacenter" class="form-control form-control-sm" name="datacenter" value="{{$server->datacenter}}" required style="height: 35px">
                                        @php ($i = 0)
                                        @foreach ($dataCenterList as $dataCenterItem)
                                        @php ($i = $i+1)
                                        <option value="{{$dataCenterItem->id}}"
                                        @if ($dataCenterItem->id == $server->datacenter)
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
                            </div>

                            <div class="form-group{{ $errors->has('template') ? ' has-error' : '' }}">
                                <label for="template" class="col-md-4 control-label">Template</label>

                                <div class="col-md-8">
                                    <input id="template" type="text" class="form-control" name="template" value="{{$server->template}}" required>

                                    @if ($errors->has('template'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('template') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ipAddress') ? ' has-error' : '' }}">
                                <label for="ipAddress" class="col-md-4 control-label">Ip Address</label>

                                <div class="col-md-8">
                                    <input id="ipAddress" type="text" class="form-control" name="ipAddress" value="{{$server->ip_address}}" required>

                                    @if ($errors->has('ipAddress'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ipAddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ipmiAddress') ? ' has-error' : '' }}">
                                <label for="ipmiAddress" class="col-md-4 control-label">IPMI Address </label>

                                <div class="col-md-8">
                                    <input id="ipmiAddress" type="text" class="form-control" name="ipmiAddress" value="{{$server->ipmi_address}}" required>

                                    @if ($errors->has('ipmiAddress'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ipmiAddress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Status</label>

                                <div class="col-md-8">
                                    <select id="status" class="form-control form-control-sm" name="status" value="{{$server->status}}" required style="height: 35px">
                                        <option value="active"
                                                @if ('active' == $server->status)    selected     @endif
                                            >active</option>
                                        <option value="inactive" @if ('inactive' == $server->status)    selected     @endif >inactive</option>
                                        <option value="closed" @if ('closed' == $server->status)    selected     @endif>closed</option>
                                        <option value="terminated" @if ('terminated' == $server->status)    selected     @endif >terminated</option>
                                    </select>
                                    @if ($errors->has('status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        edit submit
                                    </button>
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
