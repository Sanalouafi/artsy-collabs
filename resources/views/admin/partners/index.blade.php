<x-admin>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Partners
    </h2>
    <button class="bg-blue-500 w-48 mb-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <a href="{{ route('partners.create') }}">Add new Partner</a>
    </button>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Partner</th>
                        <th class="px-4 py-3">phone</th>
                        <th class="px-4 py-3">adress</th>
                        <th class="px-4 py-3">type</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($partners as $partner)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="{{$partner->getFirstMediaUrl('partner')}}"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $partner->email }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $partner->name }} </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $partner->phone }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $partner->adress}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $partner->type }}
                            </td>
                            =
                            <td class="px-4 py-3 text-sm">
                                <a href="{{ route('partners.edit', $partner->id) }}"
                                    class="text-gray-400 hover:text-gray-100 mx-2">
                                    <i class="material-icons-outlined text-base">edit</i>
                                </a>
                                <form action="{{ route('partners.destroy', $partner->id) }}" method="POST"
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
</x-admin>
