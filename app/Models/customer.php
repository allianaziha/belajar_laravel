<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['id','name_customer','gender','contact'];
    public $timestamp = true;

    public function customer ()
    {
        return $this->hasMany(customer::class);
    }

}
