@extends('template.master')
    @section('content')
        <h1>Detail Mata Pelajaran</h1><br>
        <table class="table table-bordered">
            <tr><th width="200">ID</th><td>{{ $matapelajaran->id }}</td></tr>
            <tr><th>Jenjang</th><td>{{ $matapelajaran->jenjang }}</td></tr>
            <tr><th>Mata Pelajaran</th><td>{{ $matapelajaran->pelajaran }}</td></tr>
            <tr><th>Tahun Ajaran</th><td>{{ $matapelajaran->tahun_ajaran }}</td></tr>
            <tr><th>User Created</th><td>{{ $matapelajaran->user_created }}</td></tr>
            {{-- <tr>
                <td>{{ $matapelajaran->id }}</td>
                <td>{{ $matapelajaran->jenjang }}</td>
                <td>{{ $matapelajaran->pelajaran }}</td>
                <td>{{ $matapelajaran->tahun_ajaran }}</td>
                <td>{{ $matapelajaran->user_created }}</td>
            </tr> --}}
        </table>
        {!! link_to('admin/matpel', 'Kembali', ['class'=>'btn btn-primary']) !!}
    @stop