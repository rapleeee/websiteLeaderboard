@extends('layouts.app')

@section('content')
    <h1>Daftar Siswa</h1>
    <form action="{{ route('siswas.store') }}" method="POST">
        @csrf
        <input type="text" name="nis" placeholder="NIS" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <select name="kelas" required>
            <option value="RPL 1">RPL 1</option>
            <option value="RPL 2">RPL 2</option>
        </select>
        <button type="submit">Tambah Siswa</button>
    </form>

    <table>
        @foreach($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>
                    @for($i = 1; $i <= 5; $i++)
                        <a href="{{ route('nilai.update', $siswa) }}" onclick="event.preventDefault(); document.getElementById('nilai-form-{{ $siswa->id }}-{{ $i }}').submit();">
                            <i class="fa {{ $i <= $siswa->nilaiSiswa->bintang ? 'fa-star' : 'fa-star-o' }}"></i>
                        </a>
                        <form id="nilai-form-{{ $siswa->id }}-{{ $i }}" action="{{ route('nilai.update', $siswa) }}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="bintang" value="{{ $i }}">
                        </form>
                    @endfor
                </td>
            </tr>
        @endforeach
    </table>
@endsection
