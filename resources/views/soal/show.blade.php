@extends('template.master')
    @section('content')
        <h1>Detail Mata Pelajaran</h1><br>
        <table class="table table-bordered">
            <tr><th width="200">ID</th><td>{{ $soal->id }}</td></tr>
            <tr><th>ID Mata Pelajaran</th><td>{{ $soal->mata_pelajaran_id }}</td></tr>
            <tr><th>Pertanyaan</th><td>{{ $soal->pertanyaan }}</td></tr>
            <tr><th>Pilihan A</th><td>{{ $soal->pilihan_a }}</td></tr>
            <tr><th>Pilihan B</th><td>{{ $soal->pilihan_b }}</td></tr>
            <tr><th>Pilihan C</th><td>{{ $soal->pilihan_c }}</td></tr>
            <tr><th>Pilihan D</th><td>{{ $soal->pilihan_d }}</td></tr>
            <tr><th>Pilihan E</th><td>{{ $soal->pilihan_e }}</td></tr>
            <tr><th>Jawaban</th><td>{{ $soal->jawaban }}</td></tr>
            <tr><th>Gambar</th><td>{{ $soal->gambar }}</td></tr>
            <tr><th>User Created</th><td>{{ $soal->user_created }}</td></tr>
        </table>
        {!! link_to('admin/soal', 'Kembali', ['class'=>'btn btn-primary']) !!}
    @stop