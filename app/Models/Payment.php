<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'agent_id',
        'insurance_company_id',
        'amount',
        'payment_type',
        'payment_mode',
        'notes',
        'payment_dt',
        'payment_status',
        'payment_by',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // ==== relationship between policy and agent
    public function agents()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }

    // ==== relationship between insurance company id
    public function insurance_companies(){
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id', 'id');
    }
}
