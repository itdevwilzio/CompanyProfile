<?php

if (! function_exists('formatRupiah')) {
    function formatRupiah($value)
    {
        $result = "Rp " . number_format($value, 0, ',', '.');
        return $result;
    }
}

