<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\User;

class Auth extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "username",
        "password"
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
