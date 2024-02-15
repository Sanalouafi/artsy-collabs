<x-artist>
    <section class="bg-white  dark:bg-gray-900" style="background-color: #e8d6ff;">
        <div class="max-w-screen-xl h-auto px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="my-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">The Lasted
                    Discouver Your Collaborations</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Lorem ipsum, dolor sit amet
                    consectetur adipisicing elit. Maiores exercitationem officia nesciunt ipsa ut dolorem.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-2 sm:gap-6 xl:gap-5 lg:space-y-0">
                @foreach ($projects as $project)
                    <div class="max-w-sm w-full lg:max-w-full lg:flex pt-10">
                        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                            style="background-image: url('{{ $project->project->getFirstMediaUrl('project') }}')"
                            title="project image">
                        </div>
                        <div
                            class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <!-- Project Details -->
                            <div class="mb-8">

                                <div class="text-gray-900 font-bold text-xl mb-2">{{ $project->project->name }}</div>
                                <p class="text-gray-700 text-base">{{ $project->project->description }}</p>
                            </div>
                            
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
</x-artist>
