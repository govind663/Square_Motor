<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'policy_no',
        'policy_type',
        'agent_id',
        'customer_name',
        'vehicle_reg_no',
        'r_t_o_id',
        'vehicle_id',
        'vehicle_config',
        'insurance_type',
        'insurance_company_id',
        'agent_company_id',
        'main_price',
        'agent_tp_premimum',
        'agent_net_premium',
        'agent_gross',
        'agent_gst',
        'profit_amt',
        'tds_deduction',
        'actual_profit_amt',
        'commission_percentage',
        'agent_comission_rupees',
        'agent_actual_comission',
        'comission_rupees',
        'payable_amount',
        'from_dt',
        'to_dt',
        'issue_dt',
        'payment_by',
        'payment_through',
        'policy_doc',
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
}
