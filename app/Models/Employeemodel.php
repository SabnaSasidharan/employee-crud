<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeemodel extends Model
{
    use HasFactory;

   protected $table= "employeemodels";
   protected $tobeinsert = ['name','email','photo','designations'];
}
