<?php
// app/Casts/FileUploadCast.php

// app/Casts/FileUploadCast.php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FileUploadCast implements CastsAttributes
{
    /**
     * Cast the stored value to the desired structure.
     *
     * @param  mixed  $value
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        return json_decode($value, true);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  mixed  $value
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return json_encode($value);
    }
}
