<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Repositories\HashtagRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HashtagController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of hashtags
     * @return illuminate\Http\Response
     */
    public function index()
    {
        $hashtags = Hashtag::all();

        return $this->successResponse($hashtags);
    }

    /**
     * Create one new hashtag
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tag' => 'required|max:100',
            'feed_id' => 'required',
        ];

        $this->validate($request, $rules);

        $hashtag = Hashtag::create($request->all());

        return $this->successResponse($hashtag, Response::HTTP_CREATED);
    }

    /**
     * Show list of feeds contain hashtag
     * @return illuminate\Http\Response
     */
    public function feedHashtag($hashtag)
    {
        $feeds = Hashtag::where('tag', $hashtag)->get(['feed_id']);

        return $this->successResponse($feeds);
    }

    /**
     * Show an existing hashtag
     * @return illuminate\Http\Response
     */
    public function show($name)
    {
        $hashtag = Hashtag::where('tag', $name)->firstOrFail();

        return $this->successResponse($hashtag);
    }

    /**
     * Modify hashtag
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $hashtag)
    {
        $rules = [
            'tag' => 'max:100',
        ];

        $this->validate($request, $rules);

        $hashtag = Hashtag::findOrFail($hashtag);

        $hashtag->fill($request->all());

        if ($hashtag->isClean()) {
            return $this->errorResponse(
                "At least one value must change",
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $hashtag->save();

        return $this->successResponse($hashtag);
    }

    /**
     * Remove an exist feed
     * @return illuminate\Http\Response
     */
    public function destroy($hashtag)
    {
        $hashtag = Hashtag::findOrFail($hashtag);

        $hashtag->delete();

        return $this->successResponse($hashtag);
    }
}
