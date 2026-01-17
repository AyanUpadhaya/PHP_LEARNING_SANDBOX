<?php

namespace App\Utils;

function formatPrice(float $amount): string {
    return number_format($amount, 2);
}

function slugify(string $text): string {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
}
