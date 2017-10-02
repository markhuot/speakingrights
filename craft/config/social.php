<?php

return [
    'allowEmailMatch' => true,

    /**
     * Google Configuration
     */
    'google' => [
        'userMapping' => [
            'firstName' => '{{ firstName }}',
            'lastName' => '{{ lastName }}',
            'email' => '{{ email }}',
        ],
    ],

    /**
     * Facebook Configuration
     */
    'facebook' => [
        'userMapping' => [
            'firstName' => '{{ firstName }}',
            'lastName' => '{{ lastName }}',
            'email' => '{{ email }}',
        ],
    ],
];