<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruc',
        'trade_name',
        'legal_name',
        'fiscal_address'
    ];
    
    public function client()
    {
        return $this->morphOne(Client::class, 'clientable');
    }
}
