<?php

namespace Swandam\Core\Models;

class Extra extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'extras';


    public function model()
    {
        return $this->morphTo();
    }
}