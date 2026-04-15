<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default SEO Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to the internal Nicxon SEO routes, 
    | including the Global SEO settings dashboard. Ensure 'auth' or a 
    | custom 'admin' middleware is present to prevent unauthorized access.
    |
    */

    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Global Fallback Assets
    |--------------------------------------------------------------------------
    |
    | Here you may specify default values for your SEO tags when a specific 
    | model (Post, Page, etc.) does not have SEO data or an image assigned.
    |
    */

    'defaults' => [
        // Path relative to the storage/app/public directory
        'image' => 'seo/default-share.jpg',
        
        // You could also add site-wide defaults here if needed
        'title_suffix' => ' | ' . env('APP_NAME', 'Nicxon'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Storage Disk
    |--------------------------------------------------------------------------
    |
    | The disk where SEO social images (OG Images) will be stored.
    | By default, this uses the public disk for web accessibility.
    |
    */

    'disk' => 'public',

];