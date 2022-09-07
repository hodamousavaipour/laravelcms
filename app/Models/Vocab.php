<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocab extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','last_seen','last_status','repeat_number'];
}
