<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class PurchaseOrder extends Authenticatable
{
    use Notifiable;
  

    protected $table      = 'purchaseorders';
    protected $primaryKey = 'id';
   
}
