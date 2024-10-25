<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientable_type',
        'clientable_id',
        'uri',
        'email',
        'phone_number'
    ];

    public function clientable()
    {
        return $this->morphTo();
    }
}
