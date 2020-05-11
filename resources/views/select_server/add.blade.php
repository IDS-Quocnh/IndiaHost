@extends('layouts.atllayout', ['title' => 'Add New Host', 'menukey' => 'severSelect'])
@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Add New Server
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
                    <form class="form-horizontal" method="POST" action="{{ route('select-server/add') }}" style="display: flex">
                        {{ csrf_field() }}

                        <div class="col-md-6">

                            <div class="form-group{{ $errors->has('hostName') ? ' has-error' : '' }}">
                                <label for="hostName" class="col-md-4 control-label">Host name</label>

                                <div class="col-md-8">
                                    <select id="hostName" class="form-control form-control-sm" name="hostName" required style="height: 35px">
                                        @php ($i = 0)
                                        @foreach ($physicalHostList as $physicalHostItem)
                                        @php ($i = $i+1)
                                        <option value="{{$physicalHostItem->id}}">{{$physicalHostItem->host_name}}</option>
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
                                <label for="powerStatus" class="col-md-4 control-label">Datacenter</label>

                                <div class="col-md-8">
                                    <select id="datacenter" class="form-control form-control-sm" name="datacenter" required style="height: 35px">
                                        @php ($i = 0)
                                        @foreach ($dataCenterList as $dataCenterItem)
                                        @php ($i = $i+1)
                                        <option value="{{$dataCenterItem->id}}">{{$dataCenterItem->name}}</option>
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
                                    <input id="template" type="text" class="form-control" name="template" required>

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
                                    <input id="ipAddress" type="text" class="form-control" name="ipAddress" required>

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
                                    <input id="ipmiAddress" type="text" class="form-control" name="ipmiAddress" required>

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
                                    <select id="status" class="form-control form-control-sm" name="status" required style="height: 35px">
                                        <option value="active">active</option>
                                        <option value="inactive">inactive</option>
                                        <option value="closed">closed</option>
                                        <option value="terminated">terminated</option>
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
                                        Register
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
