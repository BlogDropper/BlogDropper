<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Superadmin routes by URL
        '/settings',
        '/maintenance-mode/toggle',
        '/user',
        '/superadminupdate/update/{id}',
        '/maintenance-mode/toggle',
        '/profile',
    ];
}
