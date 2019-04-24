<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Items extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'items';
    protected $primaryKey = 'id';
   
}
