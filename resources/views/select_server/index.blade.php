@extends('layouts.atllayout', ['title' => 'Physical Host', 'menukey' => 'severSelect'])

@section('content')
<nav aria-label="breadcrumb" class="pt-2">
    <ol class="breadcrumb bg-light">
        Server List
    </ol>
</nav>
@if(Auth::user()->is_admin == 1)
    <a href="{{route('select-server/add')}}" type="button" class="btn btn-success" style="margin-bottom: 15px;">Add New</a>
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
@foreach ($serverList as $serverItem)
@php ($i = $i+1)
<div class="row" style="margin-bottom: 15px">
    <div class="col-8">
        <div class="card shadow-sm">
            <h5 class="card-header bg-primary text-white">{{$serverItem->host_name}} - {{$serverItem->datacenter}}</h5>
            <div class="row">
                <div class="col pr-0">
                    <table class="table table-hover m-0">
                        <tbody>
                        <tr>
                            <th scope="row">Datacenter</th>
                            <td class="text-right">{{$serverItem->datacenter}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Template</th>
                            <td class="text-right">{{$serverItem->template}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col pl-0 border-left border-secondary">
                    <table class="table table-hover m-0">
                        <tbody>
                        <tr>
                            <th scope="row">Ip address</th>
                            <td class="text-right">{{$serverItem->ip_address}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td class="text-right">{{$serverItem->status}}</td>
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
                           data-toggle="modal" data-target="#iframe-modal"
                           style="margin-bottom: 15px" iframeId="iframeHolder-{{$serverItem->id}}"
                           data-value="https://cnn.it/2WNWr3g"
                           role="button" target="_BLANK">Login to WHM</a>
                        @if(Auth::user()->is_admin == 1)
                            <a href="{{route('select-server/edit',['id' => $serverItem->id])}}" type="button" class="btn btn-primary " style="margin-bottom: 15px;">Edit</a>
                            <form method="POST" action="{{ route('select-server/delete') }}" style="display: inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$serverItem->id}}" />
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
<div class="modal fade" id="iframe-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="max-width: 1500px">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:1350px;margin-left: -400px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">WHM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" id="iframeHolder" style="margin-bottom: 15px ;">
                    <iframe id="iframe" src="" name="iframe" width="100%" height="650" ></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".access_whm").click(function(){
        var url=$(this).data("value");
        $('#iframe').attr('src',url);
    });
</script>
@endsection
