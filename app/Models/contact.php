<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'subject',
        'email',
        'phone',
        'message',
    ];
}
