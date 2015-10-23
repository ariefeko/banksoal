@extends('template.master')
    @section('content')

        {!! link_to('admin/soal/create', 'Create Soal', ['class'=>'btn btn-primary']) !!}

        <table class="table table-bordered">
            <tr>
                <th>ID Soal</th>
                <th>ID Mata Pelajaran</th>
                <th>Pertanyaan</th>
                <th>Pilihan A</th>
                <th>Pilihan B</th>
                <th>Pilihan C</th>
                <th>Pilihan D</th>
                <th>Pilihan E</th>
                <th>Jawaban</th>
                <th>Gambar</th>
                <th>User Created</th>
                <th>Action</th>
            </tr>
            @foreach($soal as $n)
                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->mata_pelajaran_id }}</td>
                    <td>{{ $n->pertanyaan }}</td>
                    <td>{{ $n->pilihan_a }}</td>
                    <td>{{ $n->pilihan_b }}</td>
                    <td>{{ $n->pilihan_c }}</td>
                    <td>{{ $n->pilihan_d }}</td>
                    <td>{{ $n->pilihan_e }}</td>
                    <td>{{ $n->jawaban }}</td>
                    <td>{{ $n->gambar }}</td>
                    <td>{{ $n->user_created }}</td>
                    <td width="204">{!! Form::open(array('method'=>'delete','url'=>'admin/soal/' . $n->id)) !!}
                        {!! link_to('admin/soal/'.$n->id,'Detail',['class'=>'btn btn-primary']) !!}
                        {!! link_to('admin/soal/'.$n->id.'/edit','Edit',['class'=>'btn btn-primary']) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {!! Form::hidden('_delete', 'Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    @stop