<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyDebitCreditLog extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'insurance_company_id',
        'tranx_dt',
        'policy_id',
        'debit_tranx',
        'credit_tranx',
        'balance',
        'tranx_type',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // relationship with insurance_company_id
    public function insuranceCompany(){
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id', 'id');
    }
}
