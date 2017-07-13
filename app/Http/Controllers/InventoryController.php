<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use App\tb_inventory;
use App\tb_activitylog;
use DB;

/**
 * Class InventoryController
 * @package App\Http\Controllers\Frontend
 */
class InventoryController extends Controller
{

    public function store(Request $request)
    {   
        // dd($request);

        $d2 = new DNS2D();
        $d2->setStorPath(__DIR__."/cache/");

        $batch = strtotime("now");

        for($i=0; $i < ($request->quantity); $i++)
        {
            $tb_inventory= tb_inventory::create([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'status' => 'IN',
                'batch'=>$batch,
                'pic_in'=>\Auth::user()->id,
                ]);
        }

        if($tb_inventory->id)
            $msg = $batch;
        else
            $msg = "Saving inventory failed!";

        return Redirect::back()->withErrors($msg);
    }

    public function showSaveDetail($id)
    {
        // $d = new DNS1D();
        // $d->setStorPath(__DIR__."/cache/");
        $d2 = new DNS2D();
        $d2->setStorPath(__DIR__."/cache/");

        // $barcode = $d2->getBarcodeHTML($barVal, "QRCODE",4,4);
        // $barcode = $d->getBarcodeHTML($barVal, "C128");
        $data = tb_inventory::whereBatch($id)->first();
        $quantity = tb_inventory::whereBatch($id)->count();
        $barcode = tb_inventory::whereBatch($id)->get();

        foreach($barcode as $code){
        $codeData[] = [ 'code' => $d2->getBarcodePNG('http://www.google.com/'.$code->id, "QRCODE",4,4),
                        'id'=>$code->id,
                        'batch'=>$code->batch,
                        'model'=>$code->model,
                        ];
        }

        return view('frontend.user.inventory.saveDetail')->with('codeData',$codeData)->with('quantity',$quantity)->with('data',$data);
    }

    public function showStore()
    {   
        return view('frontend.user.inventory.store');
    }

    public function showInventory()
    {
        if(tb_inventory::get()->count()>0){
        $dataIn = tb_inventory::select(array('tb_inventory.*', DB::raw('COUNT(id) as quantity')))
                                ->whereStatus('IN')->groupby('batch')->get();
        $dataOut = tb_inventory::select(array('tb_inventory.*', DB::raw('COUNT(id) as quantity')))
                                ->whereStatus('OUT')->groupby('batch')->get();
        $data = tb_inventory::select(array('tb_inventory.*', DB::raw('COUNT(id) as countItem')))->groupby('batch')->get();
        }
        
        else{
            $dataIn = $dataOut = $data = Null;
        }

        return view('frontend.user.inventory.inventory')->with('dataIn',$dataIn)->with('dataOut',$dataOut)->with('data',$data);
    }

    public function autoComplete()
    {
        $data = tb_inventory::whereStatus('IN')->groupby('batch')->lists('name');
        return json_encode($data);
    }

    public function showlog(){
        $data = tb_activitylog::get();

        return view('frontend.user.inventory.log')->with('data',$data);

    }


}