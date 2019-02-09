<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'fb_check_email',
        'check_email',
        'check_email_and_password',
        'send_email',
        'login_user',
        'check_compatibility',
        'register_action',
        'home/is_after_attention_more_information',
        'is_after_attention_more_information',
        'home_get_available_roads',
        'home/home_get_available_roads',
        'update_profile_data_reminder',
        'set_my_roads',
        'home/set_my_roads',
        'update_profile_additional',
        'home/update_profile_additional',
        'https://direct.paylane.com/rest/'
    ];
}
