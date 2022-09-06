<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\DonationRequestsFacade\DonationRequestsFacade;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['donations'] = DonationRequestsFacade::all();
        return view('pages.donationRequest.all')->with($response);
    }

    /**
     * view
     *
     * @param  mixed $request_id
     * @return void
     */
    public function view($request_id)
    {
        $response['donations'] = DonationRequestsFacade::get($request_id);
        DonationRequestsFacade::read($request_id);
        return view('pages.donationRequest.view')->with($response);
    }

     /**
      * delete
      *
      * @param  mixed $request_id
      * @return void
      */
     public function delete($request_id)
    {
        DonationRequestsFacade::delete($request_id);
        $response['alert-success'] = 'donation Request deleted successfully';
        return redirect()->back()->with($response);
    }

}
