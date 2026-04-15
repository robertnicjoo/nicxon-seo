<div class="nicxon-seo-box" style="background:#f8fafc; padding:20px; border:1px solid #e2e8f0; border-radius:10px; font-family:sans-serif;">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h4 style="margin:0">Nicxon SEO Preview</h4>
        <div id="seo-dot" style="width:12px; height:12px; border-radius:50%; background:#cbd5e1;"></div>
    </div>

    <div style="background:white; padding:15px; border-radius:8px; margin:15px 0; border:1px solid #e2e8f0;">
        <div style="color:#202124; font-size:14px;">{{ url('/') }}/...</div>
        <div id="p-title" style="color:#1a0dab; font-size:20px; margin:4px 0;">Preview Title</div>
        <div id="p-desc" style="color:#4d5156; font-size:14px;">Please enter a description...</div>
    </div>

    <label style="display:block; font-weight:bold; margin-bottom:5px;">SEO Title</label>
    <input type="text" name="nicxon_seo_title" id="ni-title" value="{{ $model->seo->title ?? '' }}" style="width:100%; padding:8px; margin-bottom:15px; border:1px solid #ccc; border-radius:4px;">
    
    <label style="display:block; font-weight:bold; margin-bottom:5px;">Meta Description</label>
    <textarea name="nicxon_seo_description" id="ni-desc" rows="3" style="width:100%; padding:8px; margin-bottom:15px; border:1px solid #ccc; border-radius:4px;">{{ $model->seo->description ?? '' }}</textarea>

    <label style="display:block; font-weight:bold; margin-bottom:5px;">Social Image (OG Image)</label>
    <input type="file" name="nicxon_og_image" style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
</div>

<script>
    const iT = document.getElementById('ni-title'), iD = document.getElementById('ni-desc');
    const pT = document.getElementById('p-title'), pD = document.getElementById('p-desc'), dot = document.getElementById('seo-dot');

    function check() {
        pT.innerText = iT.value || 'Preview Title';
        pD.innerText = iD.value || 'Please enter a description...';
        // Simple logic: Green if title is 40-60 chars and description exists
        const ok = (iT.value.length >= 40 && iT.value.length <= 60 && iD.value.length > 100);
        dot.style.background = ok ? '#22c55e' : '#facc15';
    }
    iT.oninput = check; iD.oninput = check; check();
</script>