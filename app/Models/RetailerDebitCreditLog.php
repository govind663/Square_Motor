<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RetailerDebitCreditLog extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'retailer_id',
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
    public function retailers(){
        return $this->belongsTo(Retailer::class, 'retailer_id', 'id');
    }
}
