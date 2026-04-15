<?php

namespace Nicxon\Seo;

use Nicxon\Seo\Models\SeoMeta;

class SeoRenderer {
    protected $model;

    public function __construct($model = null) {
        $this->model = $model;
    }

    public function render() {
        // Priority 1: Specific Model SEO
        if ($this->model && $this->model->seo) {
            return $this->generateTags($this->model->seo);
        }

        // Priority 2: Global Fallback
        $global = SeoMeta::where('seoable_type', 'Global')->first();
        if ($global) {
            return $this->generateTags($global);
        }

        return '';
    }

    private function generateTags($meta) {
        $url = url()->current();
        $siteName = config('app.name');
        
        // Logic for Title
        $suffix = config('nicxon-seo.defaults.title_suffix', '');
        $fullTitle = ($meta->seoable_type === 'Global') ? $meta->title : $meta->title . $suffix;

        // Logic for Image
        $imagePath = $meta->og_image ?: config('nicxon-seo.defaults.image');
        $imageUrl = $imagePath ? asset('storage/' . $imagePath) : null;

        // Escape variables for HTML safety
        $eTitle = e($fullTitle);
        $eDesc = e($meta->description);
        $eUrl = e($url);
        $eSiteName = e($siteName);

        return "
            <title>{$eTitle}</title>
            <meta name='title' content='{$eTitle}'>
            <meta name='description' content='{$eDesc}'>
            <link rel='canonical' href='{$eUrl}'>

            <meta property='og:type' content='website'>
            <meta property='og:url' content='{$eUrl}'>
            <meta property='og:title' content='{$eTitle}'>
            <meta property='og:description' content='{$eDesc}'>
            <meta property='og:site_name' content='{$eSiteName}'>
            " . ($imageUrl ? "<meta property='og:image' content='" . e($imageUrl) . "'>" : "") . "

            <meta property='twitter:card' content='summary_large_image'>
            <meta property='twitter:url' content='{$eUrl}'>
            <meta property='twitter:title' content='{$eTitle}'>
            <meta property='twitter:description' content='{$eDesc}'>
            " . ($imageUrl ? "<meta property='twitter:image' content='" . e($imageUrl) . "'>" : "") . "
        ";
    }
}