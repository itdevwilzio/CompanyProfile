<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Locations') }}
            </h2>
            <a href="{{ route('admin.locations.create') }}"
                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($locations as $location)
                    <div class="flex flex-row items-center justify-between item-card">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($location->image) }}" alt=""
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $location->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $location->created_at }}</h3>
                        </div>
                        <div class="flex gap-2 flex-col">
                            <a href="{{ route('admin.voucher_packages.index', $location->id) }}" class="text-indigo-600 hover:text-indigo-800 hover:bg-gray-100 rounded-full px-3 font-bold py-2 flex gap-2 items-center">View Voucher Packages <i class="feather icon-arrow-right-circle text-lg"></i></a>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.locations.edit', $location) }}"
                                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.locations.destroy', $location) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>belum ada data terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
