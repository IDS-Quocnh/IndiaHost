<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\DataCenter;
use App\Model\PhysicalHost;

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
            return view('data_center.list')->with('susscessMessage', 'User registered successfully')->with('dataCenterList', $dataCenterList);
        }
        return view('data_center.list')->with('dataCenterList', $dataCenterList);
    }

    public function details(Request $request)
        {
            $dataCenterItem = DataCenter::find($request->id)->first();
            return view('data_center.details')->with('dataCenterItem', $dataCenterItem);
        }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:datacenter|min:3',
                'location' => 'required|min:4',
            ]);

            $dataCenter = DataCenter::find($request->id);
            $name = $dataCenter->name;
            $dataCenter->setAttributeMap($request->all());
            $dataCenter->save();
            $dataCenterList = DataCenter::orderBy('created_at','desc')->get();
            return view('data_center.list')->with('susscessMessage','data center name "' . $name . '" edit successfully')
                                           ->with('dataCenterList', $dataCenterList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $dataCenter = DataCenter::find($request->id);
            return view('data_center.main')->with('dataCenter', $dataCenter);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|unique:datacenter|min:3',
                'location' => 'required|min:4',
            ]);

            $dataCenter = new DataCenter;
            $dataCenter->setAttributeMap($request->all());
            $dataCenter->save();
            return view('data_center.main')->with('susscessMessage','add data center successfully');
        }else{
            return view('data_center.main');
        }
    }

    public function delete(Request $request)
    {
        $dataCenter = DataCenter::find($request->id);
        $deletePhysicalHostList =PhysicalHost::query()->where('physical_host.datacenter', '=', $request->id)->get();
        foreach($deletePhysicalHostList as $deletePhysicalHostItem){
            $deletePhysicalHostItem->delete();
        }
        $name = $dataCenter->name;
        $dataCenter->delete();
        $dataCenterList = DataCenter::orderBy('created_at', 'desc')->get();
        return view('data_center.list')->with('susscessMessage', 'Data center name "' . $name . '" deleted successfully')->with('dataCenterList', $dataCenterList);
    }
}
