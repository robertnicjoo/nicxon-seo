<?php

namespace Nicxon\Seo\Http\Controllers;

use Illuminate\Http\Request;
use Nicxon\Seo\Models\SeoMeta;
use App\Http\Controllers\Controller;

class GlobalSeoController extends Controller {
    public function edit() {
        $global = SeoMeta::firstOrNew(['seoable_type' => 'Global', 'seoable_id' => 0]);
        return view('nicxon-seo::global-form', compact('global'));
    }

    public function update(Request $request) {
        $imgPath = $request->old_image;
        
        if ($request->hasFile('nicxon_og_image')) {
            $imgPath = $request->file('nicxon_og_image')->store('seo', 'public');
        }

        SeoMeta::updateOrCreate(
            [
                'seoable_type' => 'Global', 
                'seoable_id'   => 0
            ],
            [
                'seoable_type' => 'Global',
                'seoable_id'   => 0,
                'title'        => $request->nicxon_seo_title,
                'description'  => $request->nicxon_seo_description,
                'og_image'     => $imgPath
            ]
        );

        return redirect()->back()->with('success', 'Global SEO Updated!');
    }
}