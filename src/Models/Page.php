<?php

namespace Swandam\Core\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $table = 'pages';
    protected $fillable = ['page_id', 'element_id', ''];
    public $timestamps = true;

    public function extras()
    {
        return $this->morphMany(Extra::class, 'model');
    }

    public function element()
    {
        return  $this->belongsTo(Element::class);
    }

    public function details()
    {
        return $this->hasMany(PageDetail::class)->join('languages', 'languages.id', 'page_details.language_id')->select('page_details.*');
    }

    public function detail()
    {
        return $this->hasOne(PageDetail::class)->join('languages', 'languages.id', 'page_details.language_id')->select('page_details.*')->first();
    }

    public function getValueAttribute($value)
    {
       return Extra::where('model_type', get_class($this))->where('model_id', $this->id)->where('key', $value)->firstOrFail()?->value;
    }
}