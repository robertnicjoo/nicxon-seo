<form action="{{ route('nicxon.seo.global.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h2>Global SEO Settings</h2>
    @include('nicxon-seo::form-fields', ['model' => $global])
    <button type="submit" style="margin-top:10px; padding:10px 20px; background:#1a0dab; color:white; border:none; border-radius:5px; cursor:pointer;">
        Save Global Settings
    </button>
</form>