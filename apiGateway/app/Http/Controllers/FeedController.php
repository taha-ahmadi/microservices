<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Repositories\FeedRepository;
use App\Services\FeedService;
use App\Services\HashtagService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the feed microservice
     * @var FeedService
     */
    public $feedService;

    /**
     * The service to consume the hashtag microservice
     * @var HashtagService
     */
    public $hashtagService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FeedService $feedService, HashtagService $hashtagService)
    {
        $this->feedService = $feedService;
        $this->hashtagService = $hashtagService;
    }

    /**
     * Return the list of feeds
     * @return illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->feedService->obtainFeeds());
    }

    /**
     * Create one new feeds
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->feedService->createFeeds(
            $request->all(),
            Response::HTTP_CREATED
        ));
    }

    /**
     * Show an existing feed
     * @return illuminate\Http\Response
     */
    public function show($feed)
    {
        return $this->successResponse($this->feedService->obtainFeed($feed));
    }

    /**
     * Modify feed
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $feed)
    {
        return $this->successResponse($this->feedService->editFeed(
            $request->all(),
            $feed
        ));
    }

    /**
     * Remove an exist feed
     * @return illuminate\Http\Response
     */
    public function destroy($feed)
    {
        return $this->successResponse($this->feedService->deleteFeed($feed));
    }

    public function feedsWithHashtag($hashtag)
    {
        return $this->successResponse($this->hashtagService->containHashtag($hashtag));
    }
}
