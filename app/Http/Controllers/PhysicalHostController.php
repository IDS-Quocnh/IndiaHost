<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use App\Model\PhysicalHost;
use App\Model\DataCenter;
use DB;
use Auth;
use Session;
use Excel;
use File;

class PhysicalHostController extends Controller
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
        $physicalHostList = PhysicalHost::query()
                            ->join('datacenter', 'physical_host.datacenter', '=', 'datacenter.id')
                            ->orderBy('physical_host.created_at','desc')
                            ->get(['physical_host.id as id', 'physical_host.power_status as power_status', 'physical_host.host_info as host_info', 'physical_host.host_status as host_status', 'physical_host.host_id as host_id', 'physical_host.host_name as host_name', 'physical_host.template as template', 'physical_host.server_health as server_health', 'physical_host.ip_address as ip_address' , 'physical_host.os as os', 'physical_host.host_url as host_url', 'physical_host.host_username as host_username', 'physical_host.host_password as host_password', 'physical_host.uptime as uptime', 'datacenter.name as name']);
        return view('physical_host.list')->with('physicalHostList', $physicalHostList);
    }

    public function details(Request $request)
    {
        $physicalHostItem = PhysicalHost::find($request->id);
        return view('physical_host.details')->with('physicalHostItem', $physicalHostItem);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $physicalHost = PhysicalHost::find($request->id);
            $name = $physicalHost->host_name;
            $physicalHost->setAttributeMap($request->all());
            $physicalHost->save();

            $physicalHostList = PhysicalHost::query()
                                        ->join('datacenter', 'physical_host.datacenter', '=', 'datacenter.id')
                                        ->orderBy('physical_host.created_at','desc')
                                        ->get(['physical_host.id as id', 'physical_host.power_status as power_status', 'physical_host.host_info as host_info', 'physical_host.host_status as host_status', 'physical_host.host_id as host_id', 'physical_host.host_name as host_name', 'physical_host.template as template', 'physical_host.server_health as server_health', 'physical_host.salt_version as salt_version' , 'physical_host.os as os', 'physical_host.host_url as host_url', 'physical_host.host_username as host_username', 'physical_host.host_password as host_password', 'physical_host.uptime as uptime', 'datacenter.name as name']);
            return view('physical_host.list')->with('susscessMessage','Physical host name "' . $name . '" edit successfully')->with('physicalHostList', $physicalHostList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('physical-host');
            }
            $physicalHost = PhysicalHost::find($request->id);
            $dataCenterList = DataCenter::orderBy('name','asc')->get();
            return view('physical_host.main')->with('physicalHost', $physicalHost)
                                             ->with('dataCenterList', $dataCenterList);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $physicalHost = new PhysicalHost;
            $physicalHost->setAttributeMap($request->all());
            $physicalHost->save();
            $dataCenterList = DataCenter::orderBy('name','asc')->get();
            return view('physical_host.main')->with('susscessMessage','add physical host successfully')
                                             ->with('dataCenterList', $dataCenterList);
        }else{
            $dataCenterList = DataCenter::orderBy('name','asc')->get();
            return view('physical_host.main')->with('dataCenterList', $dataCenterList);
        }
    }

    public function delete(Request $request)
    {
        $physicalHost = PhysicalHost::find($request->id);
        $name = $physicalHost->host_name;
        $physicalHost->delete();
        $physicalHostList = PhysicalHost::orderBy('created_at', 'desc')->get();
        return view('physical_host.list')->with('susscessMessage', 'Physical host name "' . $name . '" deleted successfully')->with('physicalHostList', $physicalHostList);
    }
}


