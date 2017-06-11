<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\tb_inventory;
use App\Http\Requests;
use Response;
use DB;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        return view('frontend.user.dashboard');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    public function getData()
    {
        $data  = tb_inventory::select(array('tb_inventory.*', DB::raw('COUNT(id) as quantity')))
                                ->whereStatus('IN')->groupby('batch')->get();

        return Response::json($data, 200); 

    }

        public function getDataOut()
    {
        $data  = tb_inventory::select(array('tb_inventory.*', DB::raw('COUNT(id) as quantity')))
                                ->whereStatus('OUT')->groupby('batch')->get();

        return Response::json($data, 200); 

    }
}
