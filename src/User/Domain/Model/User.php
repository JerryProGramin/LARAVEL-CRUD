<?php

declare(strict_types=1);

namespace Src\User\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['email', 'password'];
    public $timestamps = true;
}
