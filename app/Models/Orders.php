<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Orders extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'orders';
    protected $primaryKey = 'id';
   
}
