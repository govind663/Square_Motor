<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentCommission extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'agent_id',
        'insurance_company_id',
        'insurance_company_i_d_id',
        'r_t_o_id',
        'vehicle_id',
        'comission_type',
        'percentage_amt',
        'fixed_amt',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // ==== relationship with agent
    public function agent(){
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    // ==== relationship with insurance company
    public function insuranceCompany(){
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id');
    }

    // ==== relationship with insurance company Ids
    public function insuranceCompanyID(){
        return $this->belongsTo(InsuranceCompanyID::class, 'insurance_company_i_d_id');
    }

    // ==== relationship with vehicle
    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
