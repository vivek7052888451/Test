<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
      protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
               
    ];
}
