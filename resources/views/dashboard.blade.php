@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Leaderboard Gabungan (RPL 1 & RPL 2)</h2>

    <!-- Leaderboard Gabungan (Peringkat 1, 2, 3) -->
    <div class="flex justify-center items-end space-x-8 mb-12">
        <!-- Peringkat 2 -->
        @if(isset($leaderboard_gabungan[1]))
        <div class="flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-green-500">
                <!-- Avatar placeholder -->
                <img src="{{ asset($leaderboard_gabungan[1]->photo) }}" alt="" class="w-full h-full rounded-full">
            </div>
            <p class="text-lg font-semibold mt-2">{{ $leaderboard_gabungan[1]->nama }}</p>
            <p class="text-sm text-gray-500">{{ $leaderboard_gabungan[1]->bintang }} Bintang</p>
            <p class="text-green-500 font-bold">2</p>
        </div>
        @endif

        <!-- Peringkat 1 -->
        @if(isset($leaderboard_gabungan[0]))
        <div class="flex flex-col items-center">
            <div class="w-32 h-32 rounded-full bg-gray-200 border-4 border-yellow-500">
                <!-- Avatar placeholder -->
                <img src="{{ asset($leaderboard_gabungan[0]->photo) }}" alt="" class="w-full h-full rounded-full">
            </div>
            <p class="text-lg font-semibold mt-2">{{ $leaderboard_gabungan[0]->nama }}</p>
            <p class="text-sm text-gray-500">{{ $leaderboard_gabungan[0]->bintang }} Bintang</p>
            <p class="text-yellow-500 font-bold text-2xl">1</p>
            <span class="text-yellow-500 mt-1"><i class="fas fa-crown"></i></span>
        </div>
        @endif

        <!-- Peringkat 3 -->
        @if(isset($leaderboard_gabungan[2]))
        <div class="flex flex-col items-center">
            <div class="w-24 h-24 rounded-full bg-gray-200 border-4 border-blue-500">
                <!-- Avatar placeholder -->
                <img src="{{ asset($leaderboard_gabungan[2]->photo) }}" alt="" class="w-full h-full rounded-full">
            </div>
            <p class="text-lg font-semibold mt-2">{{ $leaderboard_gabungan[2]->nama }}</p>
            <p class="text-sm text-gray-500">{{ $leaderboard_gabungan[2]->bintang }} Bintang</p>
            <p class="text-blue-500 font-bold">3</p>
        </div>
        @endif
    </div>

    <!-- Leaderboard Kelas Layout (side-by-side) -->
    <div class="flex flex-cols-1 justify-center md:grid-cols-2 gap-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">Leaderboard Kelas RPL 1</h3>
            <ul class="divide-y divide-gray-200">
                @foreach($leaderboard_rpl1 as $siswa)
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-700">{{ $siswa->nama }}</span>
                        <div class="flex items-center">
                            <i class="fas fa-star text-blue-400"></i>
                            <span class="ml-2 text-white bg-blue-400 px-4 py-2 rounded-full">{{ $siswa->bintang }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-3xl font-bold text-gray-800 mb-4 text-center">Leaderboard Kelas RPL 2</h3>
            <ul class="divide-y divide-gray-200">
                @foreach($leaderboard_rpl2 as $siswa)
                    <li class="py-4 flex justify-between items-center">
                        <span class="text-lg font-semibold text-gray-700">{{ $siswa->nama }}</span>
                        <div class="flex items-center">
                            <i class="fas fa-star text-green-400"></i>
                            <span class="ml-2 text-white bg-green-400 px-4 py-2 rounded-full">{{ $siswa->bintang }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
