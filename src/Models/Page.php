<?php

namespace Swandam\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'elements';
    protected $fillable = ['website_id', 'type', 'status', 'detail_page', 'category', 'criteria', 'property', 'searchable', 'display'];
    public $timestamps = true;

    public function model()
    {
        return $this->morphTo();
    }

    public function getValueAttribute($value)
    {
        return Extra::where('model_type', get_class($this))->where('model_id', $this->id)->where('key', $value)->firstOrFail()?->value;
    }
}