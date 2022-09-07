<?php

namespace App\Traits;

use App\Models\BookingRequest;
use domain\Facades\BookingRequestsFacade\BookingRequestsFacade;
use domain\Facades\Business\BusinessFacade;
use domain\Facades\GalleryFacade\GalleryFacade;
use domain\Facades\Users\UserFacade;
use domain\Facades\VisitorRequestFacade\VisitorRequestFacade;
use Illuminate\Support\Str;

trait FormHelper
{
    /**
     * check image and return
     *
     * @param  mixed $images
     * @return void
     */
    public function allImage($images)
    {
        if ($images) {
            return '<img src=' . config('images.access_path') . '/thumb/35x35/' . $images->name . '>';
        } else {
            return '<img src=' . asset('img/no.jpg') . ' width="50px">';
        }
    }

    public function allImageCrop($images)
    {
        if ($images) {
            return '<img src=' . config('images.access_path') . '/crop/' . $images->name . ' width="100px">';
        } else {
            return '<img src=' . asset('img/no.jpg') . ' width="50px">';
        }
    }

    /**
     * get status badge
     *
     * @param  mixed $status
     * @return void
     */
    public function getStatus($status)
    {
        if ($status == 1) {
            return  '<span class="badge badge-success">Published</span>';
        } else {
            return  '<span class="badge badge-danger">Drafted</span>';
        }
    }

    /**
     * get designation
     *
     * @param  mixed $status
     * @return void
     */
    public function getDesignation($status)
    {
        if ($status == 1) {
            return  '<span class="badge badge-primary">WORKER</span>';
        } else {
            return  '<span class="badge badge-warning">MANAGER</span>';
        }
    }

    /**
     * limit String
     *
     * @param  mixed $str
     * @return void
     */
    public function limitStr($str, $limit)
    {
        return Str::limit($str ? $str : '', $limit);
    }

    /**
     * price format change to show decimal
     *
     * @param  mixed $price
     * @return void
     */
    public function priceFormat($price)
    {
        return number_format($price ? $price : 0, 2);
    }

    /**
     * number Format
     *
     * @param  mixed $number
     * @return void
     */
    public function numberFormat($number)
    {
        return number_format($number ? $number : 0);
    }


    public function galleryCount()
    {
        return $this->numberFormat(GalleryFacade::all()->count());
    }

    public function galleryActiveCount()
    {
        return $this->numberFormat(GalleryFacade::allActive()->count());
    }

    public function totalCountOfUnreadVisitorRequests()
    {
        return VisitorRequestFacade::totalCountOfUnreadVisitorRequests();
    }

    public function totalCountOfUnreadBookingRequests()
    {
        return BookingRequestsFacade::totalCountOfUnreadBookingRequests();
    }
}
