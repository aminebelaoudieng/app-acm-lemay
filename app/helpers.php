<?php
function money($number)
{
    return number_format($number, 0, '.', ' ') . "$";
}

function translateData($key, $value)
{
    if (empty($value) || is_null($value)) {
        return __($key . '.'); // Cette clé correspond à la clé vide '' dans les fichiers de traduction
    }
    return __($key . '.' . $value);
}
