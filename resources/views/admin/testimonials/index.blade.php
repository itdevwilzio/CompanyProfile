<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between px-4 lg:px-8">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Testimonials') }}
            </h2>
            <a href="{{ route('admin.testimonials.create') }}"
                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="px-4 lg:px-8">
            <div class="flex flex-col p-10 bg-white shadow-sm sm:rounded-lg gap-y-5">
                @forelse ($testimonials as $testimonial)
                    <div class="flex flex-row items-center justify-between p-6 bg-gray-50 rounded-lg shadow-md gap-x-6">
                        <div class="flex flex-row items-center gap-x-6">
                            <img src="{{ Storage::url($testimonial->thumbnail) }}" alt="{{ $testimonial->client->name }}"
                                class="rounded-2xl object-cover w-[100px] h-[100px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $testimonial->client->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $testimonial->created_at->format('d M, Y') }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-4">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                class="px-6 py-3 font-bold text-white bg-indigo-700 rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-3 font-bold text-white bg-red-700 rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Belum ada data terbaru</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
