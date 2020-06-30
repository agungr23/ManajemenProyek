<?php
function indo_currency($nominal){
    return $result = "Rp " . number_format($nominal, 2, ',', '.');
}