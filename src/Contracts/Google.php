<?php

namespace RodShaffer\GoogleApi\Contracts;

interface Google
{
    /**
     * Get a Google_Client instance
     *
     * @param array $config
     * @return \Google_Client
     */
    public static function getClient(array $config = array());

    /**
     * Get a Google_Service_* instance
     *
     * @param \Google_Client $client
     * @param string $service
     * @return mixed|object
     * @throws \RodShaffer\GoogleApi\Exceptions\ServiceNotFoundException
     * @throws \ReflectionException
     */
    public static function getService(\Google_Client $client, string $service);
}
