@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Daftar Siswa {{ $kelas }}</h2>

    <!-- Form Tambah Siswa -->
    <form action="{{ route('siswa.store') }}" method="POST" class="mb-6 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nis">NIS</label>
            <input type="text" name="nis" id="nis" placeholder="NIS" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Nama" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <input type="hidden" name="kelas" value="{{ $kelas }}">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Siswa</button>
    </form>

    <!-- Daftar Siswa -->
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">NIS</th>
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Kelas</th>
                    <th class="py-3 px-6">Total Bintang</th>
                    <th class="py-3 px-6">Tambah Bintang</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswas as $index => $siswa)
                <tr class="bg-white border-b">
                    <td class="py-4 px-6">{{ $index + 1 }}</td>
                    <td class="py-4 px-6">{{ $siswa->nis }}</td>
                    <td class="py-4 px-6">{{ $siswa->nama }}</td>
                    <td class="py-4 px-6">{{ $siswa->kelas }}</td>
                    <td class="py-4 px-6" id="bintang-{{ $siswa->id }}">{{ $siswa->nilaiSiswa ? $siswa->nilaiSiswa->bintang : 0 }}</td>
                    <td class="py-4 px-6">
                        <span class="star cursor-pointer" data-siswa="{{ $siswa->id }}" style="font-size: 24px; color: {{ $siswa->nilaiSiswa && $siswa->nilaiSiswa->bintang > 0 ? 'gold' : 'gray' }}">&#9733;</span>
                    </td>
                    <td class="py-4 px-6">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="text-blue-500 hover:text-blue-700 mr-3">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript untuk Menghandle Klik Bintang -->
<script>
    document.querySelectorAll('.star').forEach(function(star) {
        star.addEventListener('click', function() {
            var siswaId = this.getAttribute('data-siswa');
            var starElement = this;

            fetch('/siswa/' + siswaId + '/increment-bintang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).then(response => response.json()).then(data => {
                if (data.success) {
                    // Update tampilan jumlah bintang
                    document.getElementById('bintang-' + siswaId).textContent = data.bintang;

                    // Ubah warna bintang menjadi emas
                    starElement.style.color = 'gold';
                }
            });
        });
    });
</script>

@endsection
