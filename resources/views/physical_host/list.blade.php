@extends('layouts.atllayout', ['title' => 'Physical Host', 'menukey' => 'physicalHost'])

@section('content')
<div class="card">
    @if(Auth::user()->is_admin == 1)
        <div class="top-card-button-wrapper">
            <a href="{{route('physical-host/add')}}" type="button" class="btn btn-success btn-sm" style="margin-bottom:15px">Add New</a>
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

    <table class="table table-hover table-striped table-responsive-lg shadow-sm">
       <thead>
          <tr class="bg-primary border border-secondary text-white">
             <th scope="col">Hostname</th>
             <th scope="col">Data Center</th>
             <th scope="col">Power status</th>
             <th scope="col">Host info</th>
             <th scope="col">Host status</th>
             <th scope="col">Template</th>
             <th scope="col">Ip Address</th>
             <th scope="col">Uptime</th>
             <th scope="col"></th>
          </tr>
       </thead>
       <tbody class="table-bordered">
       @foreach ($physicalHostList as $physicalHostItem)
          <tr>
             <td class="align-middle"><a href="{{route('physical-host/edit',['id' => $physicalHostItem->id])}}">{{$physicalHostItem->host_name}}</a></td>
             <td class="align-middle">{{$physicalHostItem->name}}</td>
             <td class="align-middle">{{$physicalHostItem->power_status}}</td>
             <td class="align-middle">{{$physicalHostItem->host_info}}</td>
             <td class="align-middle">{{$physicalHostItem->host_status}}</td>
             <td class="align-middle">{{$physicalHostItem->template}}</td>
             <td class="align-middle">{{$physicalHostItem->ip_address}}</td>
             <td class="align-middle">{{$physicalHostItem->uptime}}</td>
             <td class="align-middle text-left">
                 <a class="btn btn-sm btn-primary" href="{{route('physical-host/details',['id' => $physicalHostItem->id])}}" role="button">View Host</a>
                 <a class="btn btn-secondary mr-1 access_whm btn-sm" role="button" target="_BLANK" data-value="{{$physicalHostItem->host_url . '/login?user=' . $physicalHostItem->host_username . '&pass='. $physicalHostItem->host_password}}" >Login to WHM</a>
                 @if(Auth::user()->is_admin == 1)
                     <a href="{{route('physical-host/edit',['id' => $physicalHostItem->id])}}" type="button" class="btn btn-primary btn-sm" >Edit</a>
                     <form method="POST" action="{{ route('physical-host/delete') }}" style="display: inline-block">
                         {{ csrf_field() }}
                         <input type="hidden" name="id" value="{{$physicalHostItem->id}}" />
                         <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                     </form>
                 @endif
             </td>
          </tr>
          @endforeach
       </tbody>
    </table>



    <script>
    $(".access_whm").click(function(){
        var url=$(this).data("value");
        var iframe = '<html><head><style>body, html {width: 100%; height: 100%; margin: 0; padding: 0}</style></head><body><iframe src="'+url+'" style="height:calc(100% - 4px);width:calc(100% - 4px)"></iframe></html></body>';
        var win = window.open("","_blank","","width=600,height=480,'',menubar=no,resizable=yes");
        win.document.write(iframe);
        });
    </script>
</div>
@endsection
