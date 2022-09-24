<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Vocab;
use App\Http\Requests\VocabRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\VocabResource;


class VocabController extends Controller
{
    public function index()
    {
        //return response()->json($user);
        $user_id = Auth::id();
        $vocabs = Vocab::where('user_id', '=', $user_id);
        return VocabResource::collection($vocabs->paginate(5));
    }

    public function store(VocabRequest $request)
    {
        $current_datetime = Carbon::now();

        $vocab = Vocab::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'last_seen' => $current_datetime,
            'last_status' => 'new',
            'repeat_number' => 0,
        ]);


        $vocab_meanings = $request->input('meaning', []);
        for ($vocab_meaning = 0; $vocab_meaning < count($vocab_meanings); $vocab_meaning++) {
            if ($vocab_meanings[$vocab_meaning] != '') {
                $vocab->meanings()->create($vocab_meanings[$vocab_meaning]);
            }
        }

        return new VocabResource($vocab);
    }

    public function show(Vocab $vocab)
    {
        return new VocabResource($vocab);
    }

    public function update(VocabRequest $request, Vocab $vocab)
    {

        $vocab->update($request->validated());

        $vocab_meanings = $request->input('meaning', []);
        foreach ($vocab_meanings as $vm) {
            if($vm['type']!=''||$vm['meaning']||$vm['sample']){
                
                $vocab->meanings()->update([
                    'type' => $vm['type'],
                    'meaning' => $vm['meaning'],
                    'sample' => $vm['sample'],
                ]);
            }
            
        }

        return new VocabResource($vocab);
    }

    public function destroy(Vocab $vocab)
    {
        $vocab->delete();

        return response()->noContent();
    }
}
