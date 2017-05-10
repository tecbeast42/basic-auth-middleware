<?php

return [

    /**
     * BasicAuth middleware will only run on the listed environments
     */
    'envs' => [
        'staging',
        'production',
    ],

    /**
     * Enter all valid user/password combinations in this array
     */
    'users' => [
        ['user' => 'sirTest', 'password' => 'secret']
    ],

];
