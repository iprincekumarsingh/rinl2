<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'complaint_number',
        'description',
        'photo',
        'eid',
        'name',
        'c_status'

    ];
}
