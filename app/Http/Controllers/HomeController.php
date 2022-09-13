<?php

namespace App\Http\Controllers;

use App\Models\Vocab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\VocabResource;

class HomeController extends Controller
{
    public function vocab_list(){

       $vocab= Vocab::where('user_id', Auth::user()->id)
        ->orderBy('name')
        ->take(10)
        ->get();

        return VocabResource::collection($vocab);
    }
}
