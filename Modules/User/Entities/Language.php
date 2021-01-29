<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'user_languages';

    protected $fillable = ['code','string'];

}
