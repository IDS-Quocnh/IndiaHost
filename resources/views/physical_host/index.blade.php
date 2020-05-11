@extends('layouts.atllayout', ['title' => 'Physical Host', 'menukey' => 'physicalHost'])

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Physical Host List
    </ol>
</nav>
@if(Auth::user()->is_admin == 1)
    <a href="{{route('physical-host/add')}}" type="button" class="btn btn-success" style="margin-bottom: 15px;">Add New</a>
@endif
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
<link href="{{ asset('assets/blacktheme/atom.css') }}" rel="stylesheet">
<link href="{{ asset('assets/blacktheme/led_lights.css') }}" rel="stylesheet">
@php ($i = 0)
@foreach ($physicalHostList as $physicalHostItem)
@php ($i = $i+1)
<div class="row" style="margin-bottom: 15px">
    <div class="col-8">
        <div class="card shadow-sm">
            <h5 class="card-header bg-primary text-white">{{$physicalHostItem->host_name}}</h5>
            <div class="row">
                <div class="col pr-0">
                    <table class="table table-hover m-0">
                        <tbody>
                        <tr>
                            <th scope="row">Power status</th>
                            <td class="text-right">{{$physicalHostItem->power_status}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Host info</th>
                            <td class="text-right">{{$physicalHostItem->host_info}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Host status</th>
                            <td class="text-right">{{$physicalHostItem->host_status}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Template</th>
                            <td class="text-right">{{$physicalHostItem->template}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Salt version</th>
                            <td class="text-right">{{$physicalHostItem->salt_version}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Uptime</th>
                            <td class="text-right">{{$physicalHostItem->uptime}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col pl-0 border-left border-secondary">
                    <table class="table table-hover m-0">
                        <tbody>
                        <tr>
                            <th scope="row">Network status</th>
                            <td class="text-right">{{$physicalHostItem->network_status}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Host ID</th>
                            <td class="text-right">{{$physicalHostItem->host_id}}</td>
                        </tr>
                        <tr>
                            <th scope="row"> IP address </th>
                            <td class="text-right">
                                {{$physicalHostItem->ip_address}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"> Server health </th>
                            <td class="text-right">
                                {{$physicalHostItem->server_health}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"> OS </th>
                            <td class="text-right">
                                {{$physicalHostItem->os}}
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">  </th>
                            <td class="text-right">

                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card shadow-sm" style="min-height: 130px;">
            <h5 class="card-header bg-primary text-white">
                <div class="row">
                    <div class="col">Action Control</div>
                    <div class="col text-right"><span class="oi oi-terminal"></span></div>
                </div>
            </h5>
            <div class="card-body">
                <center>
                    <div>
                        <a class="btn btn-secondary mr-1 access_whm"
                           style="margin-bottom: 15px"
                           role="button" target="_BLANK" data-value="https://cnn.it/2WNWr3g" >Login to WHM</a>
                        @if(Auth::user()->is_admin == 1)
                            <a href="{{route('physical-host/edit',['id' => $physicalHostItem->id])}}" type="button" class="btn btn-primary " style="margin-bottom: 15px;">Edit</a>
                            <form method="POST" action="{{ route('physical-host/delete') }}" style="display: inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$physicalHostItem->id}}" />
                                <button type="submit" class="btn btn-danger" style="margin-bottom: 15px;">Delete</button>
                            </form>
                        @endif

                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
$(".access_whm").click(function(){
    var url=$(this).data("value");
    var iframe = '<html><head><style>body, html {width: 100%; height: 100%; margin: 0; padding: 0}</style></head><body><iframe src="'+url+'" style="height:calc(100% - 4px);width:calc(100% - 4px)"></iframe></html></body>';
    var win = window.open("","_blank","","width=600,height=480,'',menubar=no,resizable=yes");
    win.document.write(iframe);
    });
</script>

@endsection
