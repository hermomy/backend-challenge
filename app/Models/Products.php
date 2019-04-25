<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Products extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'products';
    protected $primaryKey = 'id';
   
}
