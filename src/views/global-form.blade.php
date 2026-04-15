<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-xl font-bold mb-6 border-b pb-2">Global SEO Settings</h2>
    
    <form action="{{ route('nicxon.seo.global.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Change $global to $model here --}}
        <input type="hidden" name="old_image" value="{{ $model->og_image ?? '' }}">

        {{-- Change $global to $model here --}}
        @include('nicxon-seo::form-fields', ['model' => $model])

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded transition duration-200">
                Update Site-Wide SEO
            </button>
        </div>
    </form>
</div>