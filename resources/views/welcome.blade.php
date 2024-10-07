@extends('layouts.app')

@section('title', 'Selamat Datang di Website Penilaian Siswa')

@section('content')
    <div class="text-center py-16">
        <!-- Hero Section -->
        <div class="max-w-2xl mx-auto">
            <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 mb-6">Selamat Datang di Website Penilaian Siswa</h1>
            <p class="text-lg text-gray-700 mb-8">
                Website ini dirancang untuk memberikan penilaian keaktifan siswa di kelas dengan sistem bintang yang menarik. Mari mulai petualangan penilaian Anda sekarang!
            </p>

            <!-- Call to Action Button -->
            <a href="{{ route('dashboard') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                Lihat Leaderboard
            </a>
        </div>


    </div>
@endsection
