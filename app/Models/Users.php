<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Users extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'users';
    protected $primaryKey = 'id';
   
}
