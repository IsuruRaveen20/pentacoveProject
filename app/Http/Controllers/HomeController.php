<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\Business\BusinessFacade;
use domain\Facades\OrderFacade;
use domain\Facades\ProfitFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HomeController extends ParentController
{
    use FormHelper;

    /**
     * dashboard
     *
     * @return void
     */
    public function index()
    {
        $response['tc'] = $this;
        return view('pages.dashboard.index')->with($response);
    }

}
