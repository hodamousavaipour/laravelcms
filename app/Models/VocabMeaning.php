<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VocabMeaning extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['vocab_id','type','meaning','sample'];


    public function vocabs()
    {
      return $this->belongsTo(Vocab::class);
    }

}
