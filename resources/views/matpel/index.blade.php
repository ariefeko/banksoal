@extends('template.master')
    @section('content')

        {!! link_to('admin/matpel/create', 'Create Mata Pelajaran', ['class'=>'btn btn-primary']) !!}

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Jenjang</th>
                <th>Mata Pelajaran</th>
                <th>Tahun Ajaran</th>
                <th>User Created</th>
                <th>Action</th>
            </tr>
            @foreach($matapelajaran as $n)
                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->jenjang }}</td>
                    <td>{{ $n->pelajaran }}</td>
                    <td>{{ $n->tahun_ajaran }}</td>
                    <td>{{ $n->user_created }}</td>
                    <td>{!! Form::open(array('method'=>'delete','url'=>'admin/matpel/' . $n->id)) !!}
                        {!! link_to('admin/matpel/'.$n->id,'Detail',['class'=>'btn btn-primary']) !!}
                        {!! link_to('admin/matpel/'.$n->id.'/edit','Edit',['class'=>'btn btn-primary']) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {!! Form::hidden('_delete', 'Delete') !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
        </table>
    @stop