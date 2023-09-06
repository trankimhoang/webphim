<?php

function mapStatusCategory($status){
    $array = [
        0 => 'Off',
        1 => 'On'
    ];

    return $array[$status] ?? '';
}

function mapStatusGenre($status){
    $array = [
        0 => 'Off',
        1 => 'On'
    ];

    return $array[$status] ?? '';
}
function mapStatusCountry($status){
    $array = [
        0 => 'Off',
        1 => 'On'
    ];

    return $array[$status] ?? '';
}
