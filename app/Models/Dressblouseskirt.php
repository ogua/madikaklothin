<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dressblouseskirt extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function payment()
    {
        return $this->hasOne(Payment::class, 'cat_id');
    }

    public function client()
    {
        return $this->belongsto(Clients::class, 'client_id');
    }
}
