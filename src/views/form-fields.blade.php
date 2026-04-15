<style>
    :root {
        --nx-bg: #f8fafc;
        --nx-box: #ffffff;
        --nx-border: #e2e8f0;
        --nx-text-main: #1e293b;
        --nx-text-muted: #64748b;
        --nx-input-bg: #ffffff;
        --nx-google-title: #1a0dab;
        --nx-google-desc: #4d5156;
    }

    @media (prefers-color-scheme: dark) {
        :root {
            --nx-bg: #1e293b;
            --nx-box: #0f172a;
            --nx-border: #334155;
            --nx-text-main: #f1f5f9;
            --nx-text-muted: #94a3b8;
            --nx-input-bg: #1e293b;
            --nx-google-title: #8ab4f8; /* Google Dark Blue */
            --nx-google-desc: #bdc1c6; /* Google Dark Gray */
        }
    }

    /* Support for Tailwind/Filament .dark class */
    .dark .nicxon-seo-box {
        --nx-bg: #1e293b;
        --nx-box: #0f172a;
        --nx-border: #334155;
        --nx-text-main: #f1f5f9;
        --nx-text-muted: #94a3b8;
        --nx-input-bg: #1e293b;
        --nx-google-title: #8ab4f8;
        --nx-google-desc: #bdc1c6;
    }

    .nicxon-seo-box input, .nicxon-seo-box textarea {
        background-color: var(--nx-input-bg);
        color: var(--nx-text-main);
    }
</style>

<div class="nicxon-seo-box" style="background: var(--nx-bg); padding:20px; border:1px solid var(--nx-border); border-radius:10px; font-family:sans-serif; color: var(--nx-text-main); transition: all 0.3s ease;">
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h4 style="margin:0; color: var(--nx-text-main);">Nicxon SEO Preview</h4>
        <div id="seo-dot" style="width:12px; height:12px; border-radius:50%; background:#cbd5e1; transition: background 0.3s ease;"></div>
    </div>

    <!-- Google Search Result Simulation -->
    <div style="background: var(--nx-box); padding:15px; border-radius:8px; margin:15px 0; border:1px solid var(--nx-border); box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <div style="color: var(--nx-text-muted); font-size:14px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ url('/') }}/...</div>
        <div id="p-title" style="color: var(--nx-google-title); font-size:20px; margin:4px 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Preview Title</div>
        <div id="p-desc" style="color: var(--nx-google-desc); font-size:14px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">Please enter a description...</div>
    </div>

    <!-- SEO Title Input -->
    <div style="margin-bottom: 15px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:5px;">
            <label style="font-weight:bold; font-size: 13px;">SEO Title</label>
            <span id="title-count" style="font-size: 11px; color: var(--nx-text-muted);">0 / 60</span>
        </div>
        <input type="text" name="nicxon_seo_title" id="ni-title" maxlength="70"
               value="{{ isset($model->seo) ? ($model->seo->title ?? '') : ($model->title ?? '') }}" 
               style="width:100%; padding:10px; border:1px solid var(--nx-border); border-radius:6px; box-sizing: border-box;">
    </div>
    
    <!-- Meta Description Input -->
    <div style="margin-bottom: 15px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:5px;">
            <label style="font-weight:bold; font-size: 13px;">Meta Description</label>
            <span id="desc-count" style="font-size: 11px; color: var(--nx-text-muted);">0 / 160</span>
        </div>
        <textarea name="nicxon_seo_description" id="ni-desc" rows="3" maxlength="200"
                  style="width:100%; padding:10px; border:1px solid var(--nx-border); border-radius:6px; box-sizing: border-box; font-family: sans-serif;">{{ isset($model->seo) ? ($model->seo->description ?? '') : ($model->description ?? '') }}</textarea>
    </div>

    <!-- Social Image -->
    <label style="display:block; font-weight:bold; font-size: 13px; margin-bottom:5px;">Social Image (OG Image)</label>
    @php 
        $currentImg = isset($model->seo) ? ($model->seo->og_image ?? null) : ($model->og_image ?? null);
    @endphp
    
    @if($currentImg)
        <div style="margin-bottom: 10px; background: var(--nx-box); padding: 5px; border-radius: 6px; border: 1px solid var(--nx-border); display: inline-block;">
            <img src="{{ asset('storage/' . $currentImg) }}" style="height: 50px; width: 80px; object-fit: cover; border-radius: 4px;">
        </div>
    @endif
    <input type="file" name="nicxon_og_image" style="width:100%; font-size: 12px; color: var(--nx-text-main);">
</div>


<script>
    (function() {
        const iT = document.getElementById('ni-title'), iD = document.getElementById('ni-desc');
        const pT = document.getElementById('p-title'), pD = document.getElementById('p-desc'), dot = document.getElementById('seo-dot');
        const cT = document.getElementById('title-count'), cD = document.getElementById('desc-count');

        function check() {
            const tVal = iT.value, dVal = iD.value;
            const tLen = tVal.length, dLen = dVal.length;

            // 1. Update Previews
            pT.innerText = tVal || 'Preview Title';
            pD.innerText = dVal || 'Please enter a description...';

            // 2. Update Counters & Colors
            cT.innerText = `${tLen} / 60`;
            cD.innerText = `${dLen} / 160`;

            // Style Title Counter
            if (tLen > 60) cT.style.color = '#ef4444'; // Red
            else if (tLen >= 40) cT.style.color = '#22c55e'; // Green
            else cT.style.color = '#64748b';

            // Style Desc Counter
            if (dLen > 160) cD.style.color = '#ef4444'; // Red
            else if (dLen >= 120) cD.style.color = '#22c55e'; // Green
            else cD.style.color = '#64748b';

            // 3. Status Dot Logic (The traffic light)
            const titlePerfect = (tLen >= 40 && tLen <= 60);
            const descPerfect = (dLen >= 120 && dLen <= 160);

            if (titlePerfect && descPerfect) {
                dot.style.background = '#22c55e'; // Perfect Green
            } else if (tLen > 0 || dLen > 0) {
                dot.style.background = '#facc15'; // OK / Yellow
            } else {
                dot.style.background = '#cbd5e1'; // Empty / Gray
            }
        }

        iT.addEventListener('input', check); 
        iD.addEventListener('input', check); 
        check(); // Initial call
    })();
</script>