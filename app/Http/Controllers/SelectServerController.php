<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use App\Server;
use App\PhysicalHost;
use App\DataCenter;
use DB;
use Auth;
use Session;
use Excel;
use File;

class SelectServerController extends Controller
{
    /*
   **
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serverList = Server::query()
            ->join('datacenter', 'server.datacenter', '=', 'datacenter.id')
            ->join('physical_host', 'server.host_name', '=', 'physical_host.id')
            ->orderBy('server.created_at','desc')
            ->get(['server.id as id', 'physical_host.host_name as host_name', 'datacenter.name as datacenter', 'server.template as template', 'server.ip_address', 'server.ipmi_address', 'server.status']);
        return view('select_server.index')->with('serverList', $serverList);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $server = Server::find($request->id);
            $server->host_name = $request->hostName;
            $server->datacenter = $request->datacenter;
            $server->template = $request->template;
            $server->ip_address = $request->ipAddress;
            $server->ipmi_address = $request->ipmiAddress;
            $server->status = $request->status;
            $server->save();

            $serverList = Server::query()
                ->join('datacenter', 'server.datacenter', '=', 'datacenter.id')
                ->join('physical_host', 'server.host_name', '=', 'physical_host.id')
                ->orderBy('server.created_at','desc')
                ->get(['server.id as id', 'physical_host.host_name as host_name', 'datacenter.name as datacenter', 'server.template as template', 'server.ip_address', 'server.ipmi_address', 'server.status']);
            return view('select_server.index')->with('susscessMessage','server edit successfully')->with('serverList', $serverList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('physical-host');
            }
            $server = Server::find($request->id);
            $dataCenterList = DataCenter::orderBy('name','asc')->get();
            $physicalHostList = PhysicalHost::orderBy('host_name','asc')->get();
            return view('select_server.edit')->with('server', $server)->with('dataCenterList', $dataCenterList)->with('physicalHostList', $physicalHostList);
        }
    }

    public function add(Request $request)
    {
        $dataCenterList = DataCenter::orderBy('name','asc')->get();
        $physicalHostList = PhysicalHost::orderBy('host_name','asc')->get();

        if ($request->isMethod('post')) {
            $server = new Server;
            $server->host_name = $request->hostName;
            $server->datacenter = $request->datacenter;
            $server->template = $request->template;
            $server->ip_address = $request->ipAddress;
            $server->ipmi_address = $request->ipmiAddress;
            $server->status = $request->status;
            $server->save();
            return view('select_server.add')->with('dataCenterList', $dataCenterList)->with('physicalHostList', $physicalHostList)->with('susscessMessage','add server successfully');
        }
            return view('select_server.add')->with('dataCenterList', $dataCenterList)->with('physicalHostList', $physicalHostList);

    }

    public function delete(Request $request)
    {
        $server = Server::find($request->id);
        $name = $server->host_name;
        $server->delete();
        $serverList = Server::query()
            ->join('datacenter', 'server.datacenter', '=', 'datacenter.id')
            ->join('physical_host', 'server.host_name', '=', 'physical_host.id')
            ->orderBy('server.created_at','desc')
            ->get(['server.id as id', 'physical_host.host_name as host_name', 'datacenter.name as datacenter', 'server.template as template', 'server.ip_address', 'server.ipmi_address', 'server.status']);
        return view('select_server.index')->with('susscessMessage', 'server deleted successfully')->with('serverList', $serverList);
    }
}


