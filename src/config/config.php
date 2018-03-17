<?php

return [
    /*
    |----------------------------------------------------------------------------
    | Google application name
    |----------------------------------------------------------------------------
    */
    'application_name' => env('GOOGLE_APP_NAME', ''),
    /*
    |----------------------------------------------------------------------------
    | Google OAuth 2.0 client_id, client_secret, redirect_uri, access_type,
    | approval_prompt
    |----------------------------------------------------------------------------
    |
    | Get these from your Google developer console.
    | https://developers.google.com/console
    |
    */
    'client_id' => env('GOOGLE_CLIENT_ID', ''),
    'client_secret' => env('GOOGLE_CLIENT_SECRET', ''),
    'redirect_uri' => env('GOOGLE_REDIRECT_URI', ''),
    'access_type' => env('GOOGLE_ACCESS_TYPE', 'online'),
    'approval_prompt' => env('GOOGLE_APPROVAL_PROMPT', 'auto'),
    'scopes' => env('GOOGLE_SCOPES', ''),
    /*
    |----------------------------------------------------------------------------
    | Google Simple API access key
    |----------------------------------------------------------------------------
    | Ensure you get a Server key, and not a Browser key.
    | https://developers.google.com/console
    |
    */
    'developer_key' => env('GOOGLE_DEVELOPER_KEY', ''),
    /*
    |----------------------------------------------------------------------------
    | Google servive account
    |----------------------------------------------------------------------------
    |
    | https://developers.google.com/console
    |
    */
    'subject_email' => env('GOOGLE_SUBJECT_EMAIL', ''),
    'service_account_key' => env('GOOGLE_SERVICE_ACCOUNT_KEY', ''),
    'service_account' => [
        /*
        | Enable service account auth or not.
        */
        'enabled' => env('GOOGLE_SERVICE_ACCOUNT_ENABLED', false),
        /*
        | Path to service account json file
        */
        'file' => env('GOOGLE_SERVICE_ACCOUNT_JSON_PATH', ''),
    ]
];