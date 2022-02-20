<?php

namespace Swandam\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function Symfony\Component\Translation\t;

class Website extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'websites';
    protected $fillable = ['name', 'domain', 'status', 'default'];
    public $timestamps = true;
}