@extends('front.layouts.banner')

@section('content')
    <!-- Banner and Content Section -->
    <section class="flex justify-center py-12 bg-white"> <!-- Set background to white -->
        <div class="text-center max-w-4xl mx-auto">
            <!-- Banner Image with styling -->
            <img src="{{ Storage::url($heroSection->banner) }}" alt="Promotion Banner" class="object-cover w-full rounded-lg shadow-lg">

            <!-- Heading and Subheading Section -->
            <h1 class="mt-8 text-5xl font-bold text-gray-800">{!! $heroSection->heading !!}</h1>
            <p class="mt-4 text-lg text-gray-700">{!! $heroSection->subheading !!}</p>

            <!-- Achievement Text Section rendered as HTML -->
            <div class="mt-8 text-gray-600 text-justify">
                {!! $heroSection->achievement !!}
            </div>
        </div>
    </section>
@endsection
