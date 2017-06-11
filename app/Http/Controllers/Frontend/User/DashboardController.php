<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // $this->insertDistance();
    	$id = \Auth::user()->id;

        
        return view('frontend.user.dashboard')
            ->withUser(access()->user());
    }

    public function showTest(){
        return view('frontend.user.testpage')
            ->withUser(access()->user());
    }


}
