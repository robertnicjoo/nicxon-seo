<?php
namespace Nicxon\Seo\Models;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model {
    protected $table = 'nicxon_seo_metas';
    protected $fillable = ['title', 'description', 'og_image'];
    public function seoable() { return $this->morphTo(); }
}