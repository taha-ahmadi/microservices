<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Repositories\FeedRepository;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedController extends Controller
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
     * Return the list of feeds
     * @return illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::all();

        return $this->successResponse($feeds);
    }

    /**
     * Create one new feeds
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'address' => 'required',
        ];

        $this->validate($request, $rules);

        $feed = Feed::create($request->all());

        return $this->successResponse($feed, Response::HTTP_CREATED);
    }

    /**
     * Show an existing feed
     * @return illuminate\Http\Response
     */
    public function show($feed)
    {
        $feed = Feed::findOrFail($feed);

        return $this->successResponse($feed);
    }

    /**
     * Modify feed
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $feed)
    {
        $rules = [
            'name' => 'max:100',
        ];

        $this->validate($request, $rules);

        $feed = Feed::findOrFail($feed);

        $feed->fill($request->all());

        if ($feed->isClean()) {
            return $this->errorResponse("At least one value must change", 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $feed->save();

        return $this->successResponse($feed);
    }

    /**
     * Remove an exist feed
     * @return illuminate\Http\Response
     */
    public function destroy($feed)
    {
        $feed = Feed::findOrFail($feed);

        $feed->delete();

        return $this->successResponse($feed);
    }
}
