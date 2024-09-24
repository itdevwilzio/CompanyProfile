<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($products as $product)
                    <!-- Card for each product -->
                    <div class="flex flex-row items-center justify-between item-card p-5 bg-gray-100 rounded-lg shadow-sm">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($product->thumbnail) }}" alt=""
                                class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-xl font-bold text-indigo-950">{{ $product->name }}</h3>
                            </div>
                        </div>
                        <div class="flex-col hidden md:flex">
                            <p class="text-sm text-slate-500">Date</p>
                            <h3 class="text-xl font-bold text-indigo-950">{{ $product->created_at }}</h3>
                        </div>
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="px-6 py-4 font-bold text-white bg-indigo-700 rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-4 font-bold text-white bg-red-700 rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Toggle Audit Log Section -->
                    <div x-data="{ showAuditLog: false }" class="mt-4">
                        <!-- Button to toggle audit log visibility -->
                        <button @click="showAuditLog = !showAuditLog" 
                            class="px-4 py-2 text-white bg-indigo-700 rounded-full hover:bg-indigo-800 focus:outline-none">
                            Toggle Audit Log
                        </button>

                        <!-- Audit Log Box -->
                        <div x-show="showAuditLog" x-transition 
                            class="mt-4 p-4 bg-gray-200 border-l-4 border-indigo-600 rounded-lg shadow-md space-y-3">
                            <h4 class="text-lg font-bold">Audit Log (Last):</h4>

                            @php
                                $lastAudit = $product->audits->last();
                            @endphp

                            @if($lastAudit)
                                <div class="p-4 bg-white border border-gray-300 rounded-lg shadow-sm">
                                    <p><strong>Event:</strong> {{ ucfirst($lastAudit->event) }}</p>
                                    <p><strong>Old Values:</strong> {{ json_encode($lastAudit->old_values) }}</p>
                                    <p><strong>New Values:</strong> {{ json_encode($lastAudit->new_values) }}</p>
                                    <p><strong>Performed by:</strong> {{ $lastAudit->user->name ?? 'System' }}</p>
                                    <p><strong>Date:</strong> {{ $lastAudit->created_at->format('Y-m-d H:i:s') }}</p>
                                </div>
                            @else
                                <p class="mt-2 text-sm text-gray-500">No audit logs available for this product.</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>No products available</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
