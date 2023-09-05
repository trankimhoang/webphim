<?php

function mapStatusCategory($status){
    $array = [
        0 => 'Off',
        1 => 'On'
    ];

    return $array[$status] ?? '';
}
