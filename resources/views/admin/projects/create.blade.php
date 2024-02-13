<x-admin>
    <div class="bg-dark rounded-3xl pt-10 mb-5">
        <h1 class="text-white text-3xl font-bold mb-10 pt-5 text-center">Add new Project</h1>

        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data"
            class="w-full max-w-xl mx-auto bg-white rounded shadow-xl relative py-4">
            @csrf
            <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                <label for="image-input" class="cursor-pointer">
                    <img id="preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                        src="{{ URL::asset('img/artist-profile.jpg') }}" alt="logo">
                </label>
                <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)">
            </div>
            <div class="py-2 px-4 md:px-8">

                <div class="bg-gray-200 rounded py-2">

                    <div class="mb-1 p-2">
                        <input id="name" name="name" type="text" placeholder="project name" required
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <input id="description" name="description" type="text" placeholder="description" required
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <label for="" class="px-2 py-1">Status</label>
                        <select name="status"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                            @foreach ($status as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1 p-2">
                        <input id="start_date" name="start_date" type="date" placeholder=" start_date" required
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <input id="end_date" name="end_date" type="date" placeholder=" end_date" required
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>
                    <div class="mb-1 p-2">
                        <select name="partner_id"
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                            @foreach ($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1 p-2">
                        <input id="budget" name="budget" type="number" placeholder="budget" required
                            class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                    </div>


                </div>
                <div class="mt-4">
                    <div class="w-full">
                        <button
                            class="h-auto lg:h-12 text-xs py-1 lg:py-2 px-2 lg-px-4 text-white font-light tracking-wider bg-gray-900 rounded-lg uppercase w-full focus:outline-none focus:shadow-outline"
                            type="submit">Send</button>
                    </div>
                </div>
            </div>
        </form>



    </div>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-admin>
