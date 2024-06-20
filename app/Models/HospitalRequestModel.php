<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalRequestModel extends Model
{
    use HasFactory;
    protected $fillable = [
        "location",
        "service",
        "status",
        "priority",
        "department",
        "requested_by",
        "assigned_by",
    ];
}
