@extends(config('nicxon-seo.layout', 'nicxon-seo::layout'))

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white dark:bg-slate-900 shadow-md rounded-lg border border-transparent dark:border-slate-800 transition-colors duration-300">
    <div class="flex items-center justify-between mb-6 border-b dark:border-slate-700 pb-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800 dark:text-slate-100">Global SEO Settings</h2>
            <p class="text-sm text-slate-500">Configure the default metadata for your entire website.</p>
        </div>
        <a href="{{ url('/') }}" target="_blank" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">View Site &rarr;</a>
    </div>
    
    <form action="{{ route('nicxon.seo.global.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Hidden field to handle old image cleanup in controller --}}
        <input type="hidden" name="old_image" value="{{ $model->og_image ?? '' }}">

        {{-- Load the shared fields (Google preview, Title, Desc, Image) --}}
        @include('nicxon-seo::form-fields', ['model' => $model])

        <div class="mt-8 flex items-center justify-between border-t dark:border-slate-700 pt-6">
            <span class="text-xs text-slate-400">Powered by Nicxon SEO Toolkit</span>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-400 text-white font-bold py-2.5 px-8 rounded-lg transition duration-200 shadow-sm">
                Save Global Settings
            </button>
        </div>
    </form>
</div>
@endsection