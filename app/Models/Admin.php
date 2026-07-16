<?php

namespace App\Models;

use Database\Factories\AdminFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {
    /** @use HasFactory<AdminFactory> */
    use HasFactory, Notifiable;

    protected $table = 'admin';
    protected $fillable = ['name', 'email', 'password'];

    /**
     * Get the attributes that should be hidden.
     *
     * @return array<string, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
