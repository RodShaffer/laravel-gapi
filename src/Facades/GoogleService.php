<?php

namespace RodShaffer\GoogleApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class GoogleService the Google API client facade
 * @package RodShaffer\GoogleApi\Facades
 */
class GoogleService extends Facade {

    /**
     * Get the Google Service facade accessor
     *
     * @return string the Google Service class
     */
    public static function getFacadeAccessor() {

        return 'GoogleService';
        
    }

}
