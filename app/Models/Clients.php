<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function measurement()
    {
        return $this->hasOne(Dressblouseskirt::class, 'client_id');
    }

    public function measurements()
    {
        return $this->hasmany(Dressblouseskirt::class, 'client_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'cat_id');
    }
}
