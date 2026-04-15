<?php
namespace Nicxon\Seo;

use Nicxon\Seo\Models\SeoMeta;

class SeoRenderer {
    protected $model;

    public function __construct($model = null) {
        $this->model = $model;
    }

    public function render() {
        if ($this->model && $this->model->seo) {
            return $this->generateTags($this->model->seo);
        }

        $global = SeoMeta::where('seoable_type', 'Global')->first();
        if ($global) {
            return $this->generateTags($global);
        }

        return '';
    }

    private function generateTags($meta) {
        return "
            <title>{$meta->title}</title>
            <meta name='description' content='{$meta->description}'>
            <meta property='og:title' content='{$meta->title}'>
            <meta property='og:image' content='" . asset('storage/' . $meta->og_image) . "'>
        ";
    }
}