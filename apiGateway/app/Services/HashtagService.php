<?php

namespace App\Services;

use App\Traits\ClientExternalService;

class HashtagService
{
    use ClientExternalService;

    /**
     * The base uri to consume the hashtag service
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
        $this->baseUri = config("services.hashtag.base_uri");
        $this->secret = config("services.hashtag.secret");
    }

    /**
     * 
     * Obtain the full list of hashtag from the hashtag service
     * @return string
     */
    public function obtainHashtags()
    {
        return $this->sendRequest("GET", "/hashtags");
    }

    /**
     * 
     * Obtain one hashtag by id from the hashtag service
     * @return string
     */
    public function obtainHashtag($id)
    {
        return $this->sendRequest("GET", "/hashtags/{$id}");
    }

    /**
     * 
     * Obtain list of feed ids contain hashtag from the hashtag service
     * @return string
     */
    public function containHashtag($hashtag)
    {
        // feeds id
        return $this->sendRequest("GET", "/hashtags/feeds/{$hashtag}");
    }

    /**
     * 
     * Create one hashtag using the hashtag service
     * @return string
     */
    public function createHashtags($request)
    {
        return $this->sendRequest("POST", "/hashtags", $request);
    }

    /**
     * 
     * Update an instance of hashtag using the hashtag service
     * @return string
     */
    public function editHashtag($request, $id)
    {
        return $this->sendRequest("PUT", "/hashtags/{$id}", $request);
    }

    /**
     * 
     * Update an instance of hashtag using the hashtag service
     * @return string
     */
    public function deleteHashtag($id)
    {
        return $this->sendRequest("DELETE", "/hashtags/{$id}");
    }
}
