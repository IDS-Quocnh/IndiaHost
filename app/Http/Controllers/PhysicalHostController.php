<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use App\PhysicalHost;
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
        $physicalHostList = PhysicalHost::orderBy('created_at','desc')->get();
        return view('physical_host.index')->with('physicalHostList', $physicalHostList);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $physicalHost = PhysicalHost::find($request->id);
            $physicalHost->power_status = $request->powerStatus;
            $physicalHost->network_status = $request->networkStatus;
            $physicalHost->host_info = $request->hostInfo;
            $physicalHost->host_name = $request->hostName;
            $physicalHost->host_id = $request->hostId;
            $physicalHost->host_status = $request->hostStatus;
            $physicalHost->ip_address = $request->ipAddress;
            $physicalHost->template = $request->template;
            $physicalHost->server_health = $request->serverHealth;
            $physicalHost->salt_version = $request->saltVersion;
            $physicalHost->os = $request->os;
            $physicalHost->uptime = $request->uptime;
            $physicalHost->host_username = $request->hostUsername;
            $physicalHost->host_password = $request->hostPassword;
            $physicalHost->host_url = $request->hostUrl;
            $physicalHost->save();

            $physicalHostList = PhysicalHost::orderBy('created_at','desc')->get();
            return view('physical_host.index')->with('susscessMessage','Physical host name "' . $request->hostName . '" edit successfully')->with('physicalHostList', $physicalHostList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('physical-host');
            }
            $physicalHost = PhysicalHost::find($request->id);
            return view('physical_host.edit')->with('physicalHost', $physicalHost);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $physicalHost = new PhysicalHost;
            $physicalHost->power_status = $request->powerStatus;
            $physicalHost->network_status = $request->networkStatus;
            $physicalHost->host_info = $request->hostInfo;
            $physicalHost->host_name = $request->hostName;
            $physicalHost->host_id = $request->hostId;
            $physicalHost->host_status = $request->hostStatus;
            $physicalHost->ip_address = $request->ipAddress;
            $physicalHost->template = $request->template;
            $physicalHost->server_health = $request->serverHealth;
            $physicalHost->salt_version = $request->saltVersion;
            $physicalHost->os = $request->os;
            $physicalHost->uptime = $request->uptime;
            $physicalHost->host_username = $request->hostUsername;
            $physicalHost->host_password = $request->hostPassword;
            $physicalHost->host_url = $request->hostUrl;
            $physicalHost->save();

            return view('physical_host.add')->with('susscessMessage','add physical host successfully');
        }else{
            return view('physical_host.add');
        }
    }

    public function delete(Request $request)
    {
        $physicalHost = PhysicalHost::find($request->id);
        $name = $physicalHost->host_name;
        $physicalHost->delete();
        $physicalHostList = PhysicalHost::orderBy('created_at', 'desc')->get();
        return view('physical_host.index')->with('susscessMessage', 'Physical host name "' . $name . '" deleted successfully')->with('physicalHostList', $physicalHostList);
    }
}


