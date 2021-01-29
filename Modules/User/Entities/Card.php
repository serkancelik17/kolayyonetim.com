<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'user_cards';

    protected $fillable = ['title','string','name_surname','number','expire_month','expire_year','cvc'];
}
