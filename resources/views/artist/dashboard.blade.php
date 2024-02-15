<x-artist>
    <section class="bg-white  dark:bg-gray-900" style="background-color: #e8d6ff;">
        <div class="max-w-screen-xl h-auto px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="my-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">The Lasted
                    Discouver Our projects</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Lorem ipsum, dolor sit amet
                    consectetur adipisicing elit. Maiores exercitationem officia nesciunt ipsa ut dolorem.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-2 sm:gap-6 xl:gap-5 lg:space-y-0">
                @foreach ($projects as $project)
                    <div class="max-w-sm w-full lg:max-w-full lg:flex pt-10">
                        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                            style="background-image: url('{{ $project->getFirstMediaUrl('project') }}')"
                            title="project image">
                        </div>
                        <div
                            class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8">
                                <p class="text-sm text-gray-600 flex items-center">
                                    {{ $status[$project->status] ?? '' }}
                                </p>

                                <div class="text-gray-900 font-bold text-xl mb-2">{{ $project->name }}</div>
                                <p class="text-gray-700 text-base">{{ $project->description }}</p>
                            </div>
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4"
                                    src="{{ $project->partner->getFirstMediaUrl('partner') }}"
                                    alt="Avatar of Jonathan Reinink">
                                <div class="text-sm">
                                    <p class="text-gray-900 leading-none">{{ $project->partner->name }}</p>
                                    <p class="text-gray-600">{{ $project->partner->email }}</p>
                                </div>
                                <div class="px-10">
                                    <button type="button" data-modal-target="collaborate-modal"
                                        data-modal-toggle="collaborate-modal"
                                        class="text-white bg-purple-700 hover:bg-purple-600 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">

                                        <span>collaborate</span>
                                    </button>
                                    <div id="collaborate-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Add your task
                                                    </h3>
                                                    <button type="button"
                                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="collaborate-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>

                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5">
                                                    <form method="POST" action="{{route('projectUsers.store')}}" id="collaborateForm"
                                                        class="flex flex-col">
                                                        @csrf
                                                        <div class="pb-5">
                                                            <input type="hidden" name="user_id"  value="{{ Auth::id() }}">
                                                            <input type="hidden" name="project_id" value="{{$project->id }}">
                                                            <input id="task" name="task" type="text"
                                                                placeholder=" task" required
                                                                class="w-full h-10 px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                                                        </div>
                                                        <button type="submit"
                                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-artist>
