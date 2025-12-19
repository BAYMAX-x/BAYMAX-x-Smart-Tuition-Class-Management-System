<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = [
        'school_name',
        'school_tagline',
        'contact_email',
        'contact_phone',
        'address',
        'timezone',
        'academic_year',
        'term_label',
        'logo_url',
        'footer_note',
    ];
}
