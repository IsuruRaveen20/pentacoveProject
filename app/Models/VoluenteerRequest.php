<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoluenteerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read'
    ];

    public function totalCountOfUnreadVoluenteerRequests()
    {
        return $this->where('read',0)->get()->count();
    }


}
