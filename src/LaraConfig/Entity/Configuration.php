<?php

namespace LaraConfig\Entity;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['key','value'];
    protected $guard = ['created_at','updated_at'];
}
