<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'meeting_url',
        'passcode',
    ];
}
