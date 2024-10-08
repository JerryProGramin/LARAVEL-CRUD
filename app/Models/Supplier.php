<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_info',
        'phone',
        'email',
        'address',
        'country',
    ];

    public function product()
    {
        return $this->HasOne(Product::class);
    }
}
