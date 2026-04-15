<?php
namespace Nicxon\Seo;

use Nicxon\Seo\Models\SeoMeta;

class SeoRenderer {
    protected $model;

    public function __construct($model = null) {
        $this->model = $model;
    }

    public function render() {
        // 1. Try to get data from the Model passed (or detected)
        if ($this->model && $this->model->seo) {
            $data = $this->model->seo;
        } 
        // 2. Fallback to Global Settings row (where seoable_id is 0)
        else {
            $data = SeoMeta::where('seoable_type', 'Global')->first();
        }

        $title = $data->title ?? config('app.name');
        $desc = $data->description ?? "Welcome to our site";
        $img = $data->og_image ? asset('storage/'.$data->og_image) : '';

        return "
            <title>{$title}</title>
            <meta name='description' content='{$desc}'>
            <meta property='og:title' content='{$title}'>
            <meta property='og:image' content='{$img}'>
        ";
    }
}