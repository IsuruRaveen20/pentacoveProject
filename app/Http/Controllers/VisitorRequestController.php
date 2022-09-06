<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\VisitorRequestFacade\VisitorRequestFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorRequestController extends ParentController
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['visitors'] = VisitorRequestFacade::all();
        return view('pages.visitorRequest.all')->with($response);
    }

    /**
     * view
     *
     * @param  mixed $request_id
     * @return void
     */
    public function view($request_id)
    {
        $response['visitors'] = VisitorRequestFacade::get($request_id);
        VisitorRequestFacade::read($request_id);
        return view('pages.visitorRequest.view')->with($response);
    }

     /**
      * delete
      *
      * @param  mixed $request_id
      * @return void
      */
     public function delete($request_id)
    {
        VisitorRequestFacade::delete($request_id);
        $response['alert-success'] = 'Visitor Request deleted successfully';
        return redirect()->back()->with($response);
    }


}
