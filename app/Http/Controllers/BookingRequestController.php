<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\BookingRequestsFacade\BookingRequestsFacade;
use Illuminate\Http\Request;

class BookingRequestController extends Controller
{
    use FormHelper;

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $response['bookings'] = BookingRequestsFacade::all();
        return view('pages.bookingRequest.all')->with($response);
    }

    /**
     * view
     *
     * @param  mixed $request_id
     * @return void
     */
    public function view($request_id)
    {
        $response['bookings'] = BookingRequestsFacade::get($request_id);
        BookingRequestsFacade::read($request_id);
        return view('pages.bookingRequest.view')->with($response);
    }

    /**
     * delete
     *
     * @param  mixed $request_id
     * @return void
     */
    public function delete($request_id)
    {
        BookingRequestsFacade::delete($request_id);
        $response['alert-success'] = 'booking Request deleted successfully';
        return redirect()->back()->with($response);
    }
}
