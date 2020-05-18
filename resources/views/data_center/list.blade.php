@extends('layouts.atllayout', ['title' => 'Data Center', 'menukey' => 'dataCenter'])

@section('content')
<div class="card">
    @if(Auth::user()->is_admin == 1)
        <div class="top-card-button-wrapper">
            <a href="{{route('datacenter/add')}}" type="button" class="btn btn-success btn-sm">Add New</a>
        </div>
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
    <table class="table datatable-button-html5-basic">
       <thead>
          <tr class="bg-primary border border-secondary text-white">
             <th scope="col">Name</th>
             <th scope="col">Location</th>
             <th scope="col">Number</th>
             <th scope="col">Provisioning UR</th>
             <th scope="col">PXE server</th>
             <th scope="col">RACK</th>
             <th scope="col"></th>
          </tr>
       </thead>
       <tbody class="table-bordered">
       @foreach ($dataCenterList as $dataCenterItem)
          <tr>
             <td class="align-middle"><a href="{{route('datacenter/details',['id' => $dataCenterItem->id])}}">{{$dataCenterItem->name}}</a></td>
             <td class="align-middle">{{$dataCenterItem->location}}</td>
             <td class="align-middle">{{$dataCenterItem->number}}</td>
             <td class="align-middle">{{$dataCenterItem->provisioning_uri}}</td>
             <td class="align-middle">{{$dataCenterItem->pxe_server}}</td>
             <td class="align-middle"><a href="{{route('datacenter/details',['id' => $dataCenterItem->id])}}">{{$dataCenterItem->rack}}</a></td>
             <td class="align-middle text-center">
             @if(Auth::user()->is_admin == 1)
                  <a href="{{route('datacenter/edit',['id' => $dataCenterItem->id])}}" class="btn btn-sm btn-primary">Edit</a>
                  <form method="POST" action="{{ route('datacenter/delete') }}" style="display: inline-block">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$dataCenterItem->id}}" />
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
              @endif
              <a class="btn btn-sm btn-primary" href="{{route('datacenter/details',['id' => $dataCenterItem->id])}}" role="button">View</a>
              </td>
          </tr>
       @endforeach
       </tbody>
    </table>
</div>
@endsection
