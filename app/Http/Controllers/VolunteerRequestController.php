<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\VolunteerRequestsFacade\VolunteerRequestsFacade;
use Illuminate\Http\Request;

class VolunteerRequestController extends Controller
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['volunteers'] = VolunteerRequestsFacade::all();
        return view('pages.volunteerRequest.all')->with($response);
    }

    /**
     * view
     *
     * @param  mixed $request_id
     * @return void
     */
    public function view($request_id)
    {
        $response['volunteers'] = VolunteerRequestsFacade::get($request_id);
        VolunteerRequestsFacade::read($request_id);
        return view('pages.volunteerRequest.view')->with($response);
    }

     /**
      * delete
      *
      * @param  mixed $request_id
      * @return void
      */
     public function delete($request_id)
    {
        VolunteerRequestsFacade::delete($request_id);
        $response['alert-success'] = 'volunteer Request deleted successfully';
        return redirect()->back()->with($response);
    }

}
