<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document_number',
        'name',
        'full_name',
        'paternal_surname',
        'maternal_surname',
        'address',
        'gender',
        'birth_at'
    ];

    public function client()
    {
        return $this->morphOne(Client::class, 'clientable');
    }
}
