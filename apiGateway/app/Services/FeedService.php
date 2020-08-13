<?php

namespace App\Services;

use App\Traits\ClientExternalService;

class FeedService
{
    use ClientExternalService;

    /**
     * The base uri to consume the feed service
     * @var string
     */
    public $baseUri;

    /**
     * The base uri to consume the feed service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config("services.feed.base_uri");
        $this->secret = config("services.feed.secret");
    }

    /**
     * 
     * Obtain the full list of feed from the feed service
     * @return string
     */
    public function obtainFeeds()
    {
        return $this->sendRequest("GET", "/feeds");
    }

    /**
     * 
     * Obtain one feed by id from the feed service
     * @return string
     */
    public function obtainFeed($id)
    {
        return $this->sendRequest("GET", "/feeds/{$id}");
    }

    /**
     * 
     * Create one feed using the feed service
     * @return string
     */
    public function createFeeds($request)
    {
        return $this->sendRequest("POST", "/feeds", $request);
    }

    /**
     * 
     * Update an instance of feed using the feed service
     * @return string
     */
    public function editFeed($request, $id)
    {
        return $this->sendRequest("PUT", "/feeds/{$id}", $request);
    }

    /**
     * 
     * Update an instance of feed using the feed service
     * @return string
     */
    public function deleteFeed($id)
    {
        return $this->sendRequest("DELETE", "/feeds/{$id}");
    }
}