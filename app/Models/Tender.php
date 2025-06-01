<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use HasFilter;

    protected $fillable = [
        'name',
        'status',
        'number',
        'external_code',
    ];
    
}
