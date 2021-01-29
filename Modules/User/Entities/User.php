<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name','email','password','language_id','phone_number','picture'];

    public function language() {
        return $this->belongsTo(Language::class);
    }

    public function cards() {
        return $this->hasMany(Card::class);
    }

    public function sites() {
        return $this->hasMany(Site::class);
    }
}
