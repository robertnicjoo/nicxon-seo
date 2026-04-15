<!-- Added 'dark:bg-slate-900 dark:border-slate-800' to the container and updated text colors -- Also included the form-fields partial which now uses CSS variables for theming -->
<div class="max-w-4xl mx-auto p-6 bg-white dark:bg-slate-900 shadow-md rounded-lg mt-10 border border-transparent dark:border-slate-800 transition-colors duration-300">
    <h2 class="text-xl font-bold mb-6 border-b dark:border-slate-700 pb-2 text-slate-800 dark:text-slate-100">
        Global SEO Settings
    </h2>
    
    <form action="{{ route('nicxon.seo.global.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="old_image" value="{{ $model->og_image ?? '' }}">

        {{-- The form-fields will now adapt automatically thanks to the CSS variables --}}
        @include('nicxon-seo::form-fields', ['model' => $model])

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-400 text-white font-bold py-2 px-6 rounded transition duration-200 shadow-sm">
                Update Site-Wide SEO
            </button>
        </div>
    </form>
</div>