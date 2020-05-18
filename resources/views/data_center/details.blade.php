@extends('layouts.atllayout', ['title' => 'Data Center Details', 'menukey' => 'dataCenter'])
@section('content')
<div class="card">
    <div class="row" style="margin-bottom: 15px">
        <div class="col-8">
            <div class="card shadow-sm">
                <h5 class="card-header bg-primary text-white">{{$dataCenterItem->name}}</h5>
                <div class="row">
                    <div class="col pr-0">
                        <table class="table table-hover m-0">
                            <tbody>
                            <tr>
                                <th scope="row">Host localtion</th>
                                <td class="text-right">{{$dataCenterItem->location}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Number</th>
                                <td class="text-right">{{$dataCenterItem->number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Provisioning URI</th>
                                <td class="text-right"><a class="badge badge-success" href="{{$dataCenterItem->provisioning_uri}}">
                                        URI
                                        </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col pl-0 border-left border-secondary">
                        <table class="table table-hover m-0">
                            <tbody>
                            <tr>
                                <th scope="row">PXE server</th>
                                <td class="text-right">{{$dataCenterItem->pxe_server}}</td>
                            </tr>
                            <tr>
                                <th scope="row">RACK</th>
                                <td class="text-right">{{$dataCenterItem->rack}}</td>
                            </tr>
                            <tr>
                                <th scope="row"> </th>
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
                        <div class="col">Server Control</div>
                        <div class="col text-right"><span class="oi oi-terminal"></span></div>
                    </div>
                </h5>
                <div class="card-body">
                    <center>
                        <div>
                            @if(Auth::user()->is_admin == 1)
                                <a href="{{route('datacenter/edit',['id' => $dataCenterItem->id])}}" type="button" class="btn btn-primary btn-sm " style="margin-bottom: 15px;">Edit</a>
                                <form method="POST" action="{{ route('datacenter/delete') }}" style="display: inline-block">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$dataCenterItem->id}}" />
                                    <button type="submit" class="btn btn-danger btn-sm" style="margin-bottom: 15px;">Delete</button>
                                </form>
                            @endif

                            @if(Auth::user()->is_admin != 1)
                            There are no action for you at this time
                            @endif
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection