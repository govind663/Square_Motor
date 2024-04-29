<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Retailer extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'mobile',
        'email',
        'vehicle_id',
        'address',
        'pincode',
        'city',
        'state',
        'discount_type',
        'percentage_amt',
        'fixed_amt',
        'status',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // === relatioship with vehicle ===
    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
