<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Vocab;
use Illuminate\Http\Request;
use App\Http\Requests\VocabRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\VocabResource;
use Symfony\Component\HttpKernel\Exception\HttpException;


class VocabController extends Controller
{
    public function index()
    {
        //return response()->json($user);
        $user_id = Auth::id();
        $vocabs = Vocab::where('user_id', '=', $user_id)->orderByRaw("FIELD(last_status, 'notknow', 'notsure', 'sure')");
        return VocabResource::collection($vocabs->paginate(10));
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

        $user_id = Auth::id();
        try {
            $vocabs = $vocab->where('user_id', $user_id)->where('id', $vocab->id)->first();
            if (is_null($vocabs)) {
                return response()->json(['message' => 'Not found'], 404);
            }
        } catch (\Exception $e) {
            //throw new HttpException(500, $e->getMessage());
            throw new HttpException(500, 'get error');
        }
        return new VocabResource($vocabs);
    }

    public function update(VocabRequest $request, Vocab $vocab)
    {

        $vocab->update($request->validated());

        $vocab_meanings = $request->input('meaning', []);
        $vocab->meanings()->delete();
        foreach ($vocab_meanings as $vm) {
            if ($vm['type'] != '' || $vm['meaning'] || $vm['sample']) {

                $vocab->meanings()->create([
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

    public function score(Request $request)
    {
        $user_id = Auth::id();
        try {
            $res=Vocab::where('user_id', $user_id)->where('id', $request->id)->update([
                'last_status' => $request->score
            ]);
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
