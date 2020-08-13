<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Repositories\HashtagRepository;
use App\Services\FeedService;
use App\Services\HashtagService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HashtagController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the hashtag microservice
     * @var HashtagService
     */
    public $hashtagService;
    
    /**
     * The service to consume the feed microservice
     * @var FeedService
     */
    public $feedService;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HashtagService $hashtagService, FeedService $feedService)
    {
        $this->feedService = $feedService;
        $this->hashtagService = $hashtagService;
    }

    /**
     * Return the list of hashtags
     * @return illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->hashtagService->obtainHashtags());
    }

    /**
     * Create one new hashtags
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->hashtagService->createHashtags(
            $request->all(),
            Response::HTTP_CREATED
        ));
    }

    /**
     * Show an existing hashtag
     * @return illuminate\Http\Response
     */
    public function show($name)
    {
        return $this->successResponse($this->hashtagService->obtainHashtag($name));
    }

    /**
     * Modify hashtag
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $hashtag)
    {
        return $this->successResponse($this->hashtagService->editHashtag(
            $request->all(),
            $hashtag
        ));
    }

    /**
     * Remove an exist hashtag
     * @return illuminate\Http\Response
     */
    public function destroy($hashtag)
    {
        return $this->successResponse($this->hashtagService->deleteHashtag($hashtag));
    }
}
