<?php

namespace App\Utils;

function formatPrice(float $amount): string {
    return number_format($amount, 2);
}

function slugify(string $text): string {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
}


function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit;
}

function current_url(): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        ? 'https'
        : 'http';

    return $scheme . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}