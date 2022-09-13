<?php

namespace App\Http\Controllers\Api;

use App\Models\Vocab;
use App\Http\Requests\VocabRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\VocabResource;
use Carbon\Carbon;


class VocabController extends Controller
{
    public function index()
    {
        return VocabResource::collection(Vocab::paginate(25));
    }

    public function store(VocabRequest $request)
    {
        $current_datetime = Carbon::now();

        $Vocab = Vocab::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'last_seen' => $current_datetime,
            'last_status' => 'new',
            'repeat_number' => 0,
          ]);
    
          return new VocabResource($Vocab);
    }

    public function show(Vocab $Vocab)
    {
        return new VocabResource($Vocab);
    }

    public function update(VocabRequest $request, Vocab $Vocab)
    {
        $Vocab->update($request->validated());

        return new VocabResource($Vocab);
    }

    public function destroy(Vocab $Vocab)
    {
        $Vocab->delete();

        return response()->noContent();
    }
}
