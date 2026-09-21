<?php

use Illuminate\Support\Facades\Route;

// if (! function_exists('active__link')) {
//     function active__link(string $name, string $active = 'active'): string {
//         return Route::is($name) ? $active : '';
//     }
// }

// if (! function_exists('alert')) {
//     function alert(string $value) {
//         session(['alert' => $value]);
//     }
// }

// if (! function_exists('validate')) {
//     function validate(array $attributes, array $rules): array {
//         return validator($attributes, $rules)->validate();
//     }
// }

if(!function_exists('active__link')) {
    function active__link(string $name, string $active = 'active'): string {
        return Route::is($name) ? $active : '';
    }
}

