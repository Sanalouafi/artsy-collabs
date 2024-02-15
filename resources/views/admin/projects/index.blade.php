<x-admin>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Projects
    </h2>
    <button class="bg-blue-500 w-48 mb-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <a href="{{ route('projects.create') }}">Add new project</a>
    </button>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">project</th>
                        <th class="px-4 py-3">description</th>
                        <th class="px-4 py-3">status</th>
                        <th class="px-4 py-3">start date</th>
                        <th class="px-4 py-3">end date</th>
                        <th class="px-4 py-3">budget</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($projects as $project)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ $project->getFirstMediaUrl('project') }}" alt=""
                                            loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $project->partner->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $project->name }} </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $project->description }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if ($project->status == 1)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Start
                                    </span>
                                @elseif ($project->status == 2)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Current
                                    </span>
                                @elseif ($project->status == 3)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                        Finished
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $project->start_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $project->end_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $project->budget }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="text-gray-400 hover:text-gray-100 mx-2">
                                    <i class="material-icons-outlined text-base">edit</i>
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        User projects
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">project</th>
                        <th class="px-4 py-3">Users</th>
                        <th class="px-4 py-3">status</th>
                        <th class="px-4 py-3">start date</th>
                        <th class="px-4 py-3">end date</th>
                        <th class="px-4 py-3">budget</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($projectUsers as $pu)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ $pu->project->getFirstMediaUrl('project') }}" alt=""
                                            loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $pu->project->partner->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $pu->project->name }} </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $pu->user->name }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if ($pu->project->status == 1)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Start
                                    </span>
                                @elseif ($pu->project->status == 2)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Current
                                    </span>
                                @elseif ($pu->project->status == 3)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                        Finished
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $pu->project->start_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pu->project->end_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pu->project->budget }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('projectUsers.destroy', $pu->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base">delete_outline</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Restore projects
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">project</th>
                        <th class="px-4 py-3">status</th>
                        <th class="px-4 py-3">start date</th>
                        <th class="px-4 py-3">end date</th>
                        <th class="px-4 py-3">budget</th>
                        <th class="px-4 py-3">Restore</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($projectsTrash as $pu)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ $pu->getFirstMediaUrl('project') }}" alt=""
                                            loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $pu->partner->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $pu->name }} </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if ($pu->status == 1)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Start
                                    </span>
                                @elseif ($pu->status == 2)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                        Current
                                    </span>
                                @elseif ($pu->status == 3)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                        Finished
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $pu->start_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pu->end_date }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pu->budget }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('projects.restore', $pu->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-gray-400 hover:text-gray-100 ml-2">
                                        <i class="material-icons-round text-base">restore_from_trash</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</x-admin>
