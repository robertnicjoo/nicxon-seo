<?php
namespace Nicxon\Seo\Traits;
use Nicxon\Seo\Models\SeoMeta;

trait HasNicxonSeo {
    public function seo() { return $this->morphOne(SeoMeta::class, 'seoable'); }

    public function updateSeo(array $data) {
        return $this->seo()->updateOrCreate(
            ['seoable_id' => $this->id, 'seoable_type' => get_class($this)],
            [
                'title' => $data['nicxon_seo_title'] ?? null,
                'description' => $data['nicxon_seo_description'] ?? null,
                'og_image' => $data['nicxon_og_image'] ?? null,
            ]
        );
    }
}