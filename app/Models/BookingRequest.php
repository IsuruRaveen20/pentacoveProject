<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'read'
    ];

    public function totalCountOfUnreadBookingRequests()
    {
        return $this->where('read',0)->get()->count();
    }
}
