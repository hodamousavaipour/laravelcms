<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vocab extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','last_seen','last_status','repeat_number'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
}
