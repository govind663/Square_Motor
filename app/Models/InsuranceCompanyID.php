<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompanyID extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'insurance_company_id',
        'company_id',
        'commision_percentage',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // ==== relationship between insurance_company_id
    public function insuranceCompany(){
        return $this->belongsTo(InsuranceCompany::class, 'insurance_company_id', 'id');
    }
}