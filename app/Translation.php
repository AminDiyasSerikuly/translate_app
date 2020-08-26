<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translation';

    protected $fillable = ['slug', 'en_translate', 'ru_translate','kz_translate', 'uz_translate', 'oz_translate'];
}
