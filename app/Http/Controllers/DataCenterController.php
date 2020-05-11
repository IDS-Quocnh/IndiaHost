<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DataCenter;

class DataCenterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $dataCenterList = DataCenter::orderBy('created_at','desc')->get();
        if(isset($request->addUser)){
            return view('data_center.index')->with('susscessMessage', 'User registered successfully')->with('dataCenterList', $dataCenterList);
        }
        return view('data_center.index')->with('dataCenterList', $dataCenterList);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $dataCenter = DataCenter::find($request->id);
            $name = $dataCenter->name;
            $dataCenter->name = $request->name;
            $dataCenter->location = $request->location;
            $dataCenter->number = $request->number;
            $dataCenter->provisioning_uri = $request->provisioningUri;
            $dataCenter->pxe_server = $request->pxeServer;
            $dataCenter->rack = $request->rack;
            $dataCenter->save();

            $dataCenterList = DataCenter::orderBy('created_at','desc')->get();
            return view('data_center.index')->with('susscessMessage','data center name "' . $name . '" edit successfully')->with('dataCenterList', $dataCenterList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $dataCenter = DataCenter::find($request->id);
            return view('data_center.edit')->with('dataCenter', $dataCenter);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $dataCenter = new DataCenter;
            $dataCenter->name = $request->name;
            $dataCenter->location = $request->location;
            $dataCenter->number = $request->number;
            $dataCenter->provisioning_uri = $request->provisioningUri;
            $dataCenter->pxe_server = $request->pxeServer;
            $dataCenter->rack = $request->rack;
            $dataCenter->save();

            return view('data_center.add')->with('susscessMessage','add data center successfully');
        }else{
            return view('data_center.add');
        }
    }

    public function delete(Request $request)
    {
        $dataCenter = DataCenter::find($request->id);
        $name = $dataCenter->name;
        $dataCenter->delete();
        $dataCenterList = DataCenter::orderBy('created_at', 'desc')->get();
        return view('data_center.index')->with('susscessMessage', 'Data center name "' . $name . '" deleted successfully')->with('dataCenterList', $dataCenterList);
    }
}
