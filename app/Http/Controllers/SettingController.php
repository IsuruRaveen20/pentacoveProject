<?php

namespace App\Http\Controllers;

use domain\Facades\Settings\SettingFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SettingController extends ParentController
{

    public function social(Request $request)
    {
        $response['social'] = SettingFacade::social();
        return view('pages.settings.social')->with($response);
    }

    public function contact(Request $request)
    {
        $response['contacts'] = SettingFacade::contact();
        return view('pages.settings.contact')->with($response);
    }

    public function day(Request $request)
    {
        $response['OpenTime'] = SettingFacade::openTime();
        $response['open_time_note'] = SettingFacade::openTimeNote();
        $response['daysInWeek'] = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $response['daysInWeekmin'] = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
        return view('pages.settings.open')->with($response);
    }

    public function restaurant(Request $request)
    {
        $response['OpenTime'] = SettingFacade::openTimeRestaurant();
        $response['open_time_note'] = SettingFacade::openTimeNoteRestaurant();
        $response['daysInWeek'] = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $response['daysInWeekmin'] = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
        return view('pages.settings.restaurant')->with($response);
    }


    public function socialUpdate(Request $request)
    {
        SettingFacade::SocialUpdate($request->all());
        return redirect()->route('settings.social')->with('alert-success', 'Social Media Settings Updated Successfully');
    }


    public function contactUpdate(Request $request)
    {
        SettingFacade::ContactUpdate($request->all());
        return redirect()->route('settings.contact')->with('alert-success', 'Contact Settings Updated Successfully');
    }


    public function dayUpdate(Request $request)
    {
        SettingFacade::OpenTimeupdate($request->all());
        return redirect()->route('settings.day')->with('alert-success', 'Open Time Setting Updated Successfully');
    }

    public function restaurantUpdate(Request $request)
    {
        SettingFacade::OpenTimeRestaurantUpdate($request->all());
        return redirect()->route('settings.restaurant')->with('alert-success', 'Restaurant Open Time Setting Updated Successfully');
    }

}
