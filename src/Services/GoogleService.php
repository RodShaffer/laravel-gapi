<?php

namespace RodShaffer\GoogleApi\Services;

use Google_Client;
use RodShaffer\GoogleApi\Contracts\Google;
use RodShaffer\GoogleApi\Exceptions\GoogleServiceException;

/**
 * Class GoogleService the Google API client service
 * @package RodShaffer\GoogleApi\Services
 */
class GoogleService implements Google
{

    /**
     * Create a new GoogleService instance.
     */
    public function __construct()
    {
    }

    /**
     * Get a Google_Client instance
     *
     * @param array $config
     * @return Google_Client
     * @throws \RodShaffer\GoogleApi\Exceptions\GoogleServiceException
     */
    public static function getClient(array $config = array())
    {

        if (empty($config)) {

            throw new GoogleServiceException('The client configuration cannot be empty.');

        }

        $client = new Google_Client($config);

        // If service_account.enabled == false but the JSON credentials path is set try to set the credentials.
        if (array_get($config, 'service_account.enabled') == false &&
            !empty(array_get($config, 'service_account.file'))) {

            try {

                $json_file = array_get($config, 'service_account.file');

                if (is_string($json_file)) {
                    if (!file_exists($json_file)) {

                        throw new GoogleServiceException('GoogleService getClient() Exception: Service account json file does not exist');
                    }

                    $json = file_get_contents($json_file);

                    if (!json_decode($json, true)) {
                        throw new GoogleServiceException('GoogleService getClient() Exception: Invalid service account json for auth config');
                    }
                }

                $client->setAuthConfig(array_get($config, 'service_account.file', ''));
                $client->setScopes(array_get($config, 'scopes', []));
                $client->setRedirectUri(array_get($config, 'redirect_uri', ''));

                return $client;

            } catch (\Google_Exception $e) {

                throw new GoogleServiceException($e->getMessage());

            }

        }

        // If service_account.enabled == true try to set the service account credentials.
        else if (array_get($config, 'service_account.enabled')) {

            try {

                $json_file = array_get($config, 'service_account.file');

                if (is_string($json_file)) {
                    if (!file_exists($json_file)) {

                        throw new GoogleServiceException('GoogleService getClient() Exception: Service account json file does not exist');
                    }

                    $json = file_get_contents($json_file);

                    if (!json_decode($json, true)) {
                        throw new GoogleServiceException('GoogleService getClient() Exception: Invalid service account json for auth config');
                    }
                }

                $client->setAuthConfig(array_get($config, 'service_account.file', ''));
                $client->useApplicationDefaultCredentials();
                $client->setScopes(array_get($config, 'scopes', []));

                if (array_get($config, 'subject_email') &&
                    !empty(array_get($config, 'subject_email'))) {

                    $client->setSubject(array_get($config, 'subject_email'));

                }

                return $client;

            } catch (\Google_Exception $e) {

                throw new GoogleServiceException($e->getMessage());

            }

        } else {

            // Set the application name
            $client->setApplicationName(array_get($config, 'application_name', ''));

            // Set Oauth2 configuration
            $client->setClientId(array_get($config, 'client_id', ''));
            $client->setClientSecret(array_get($config, 'client_secret', ''));
            $client->setRedirectUri(array_get($config, 'redirect_uri', ''));
            $client->setAccessType(array_get($config, 'access_type', 'online'));
            $client->setApprovalPrompt(array_get($config, 'approval_prompt', 'auto'));
            $client->setScopes(array_get($config, 'scopes', []));

            // Set the developer key
            $client->setDeveloperKey(array_get($config, 'developer_key', ''));

            return $client;

        }

    }

    /**
     * Get a Google_Service_* instance
     *
     * @param \Google_Client $client
     * @param string $service
     * @return mixed|object
     * @throws \RodShaffer\GoogleApi\Exceptions\GoogleServiceException
     */
    public static function getService(Google_Client $client, string $service)
    {

        if (class_exists($service)) {

            try {

                $class = new \ReflectionClass($service);
                return $class->newInstance($client);

            } catch (\ReflectionException $e) {

                throw new GoogleServiceException($e->getMessage());

            }

        }

        throw new GoogleServiceException('Service \'' . $service . '\' not found.');

    }

}
