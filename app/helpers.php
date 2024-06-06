<?php

function formatPrice($number)
{
    if ($number >= 1000000000000000) {
        return number_format($number / 1000000000000000, 2) . "Qa";
    } else if ($number >= 1000000000000) {
        return number_format($number / 1000000000000, 2) . "T";
    } else if ($number >= 1000000000) {
        return number_format($number / 1000000000, 2) . "B";
    } else if ($number >= 1000000) {
        return number_format($number / 1000000, 2) . "M";
    } else if ($number >= 1000) {
        return number_format($number / 1000, 2) . "k";
    } else {
        return strval(number_format($number));
    }
}