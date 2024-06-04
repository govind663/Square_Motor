<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyId extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'insurance_company_id',
        'insurance_company_i_d_id',
        'tds_in_percentage',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // ==== relationship with insurance company
    public function insuranceCompanies(){
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id');
    }

    // ==== relationship with insurance company Ids
    public function insuranceCompanyIdies(){
        return $this->belongsTo(InsuranceCompanyID::class, 'insurance_company_i_d_id');
    }
}
