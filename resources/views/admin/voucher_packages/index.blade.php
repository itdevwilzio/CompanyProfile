<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div class="flex gap-2 items-center">
                <a href="{{ route('admin.locations.index') }}" class="flex rounded-full hover:bg-gray-100 p-4 items-center justify-center hover:text-indigo-700">
                    <i class="feather icon-arrow-left text-xl"></i></a>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Manage Voucher Packages for ' . $location->name) }}
                </h2>
            </div>
            <a href="{{ route('admin.voucher_packages.create', $location->id) }}"
                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($voucher_packages as $voucher)
                    <div class="flex flex-row items-center justify-between item-card">
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Name</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $voucher->name }}</h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Price</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $voucher->price }}</h3>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $voucher->created_at }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.voucher_packages.edit', ['location' => $location->id, 'voucher_package' => $voucher]) }}"
                                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.voucher_packages.destroy', ['location' => $location->id, 'voucher_package' => $voucher]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full shadow-[0_8px_0_rgba(0,0,0,0.4)] hover:shadow-[0_4px_0_rgba(0,0,0,0.4)] active:shadow-[0_2px_0_rgba(0,0,0,0.6)] hover:translate-y-1 active:translate-y-2 transition-all duration-300 ease-in-out">
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
