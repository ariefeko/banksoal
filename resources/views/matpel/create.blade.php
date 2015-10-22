@extends('template.master')
@section('content')
    {!! Form::open(array('url'=>'admin/matpel')) !!}
    <table class="table table-bordered">
        <tr>
            <td width="200">Jenjang</td><td>{!! Form::text('jenjang',null,['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Mata Pelajaran</td><td>{!! Form::text('pelajaran',null,['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td><td>{!! Form::text('tahun_ajaran',null,['class'=>'form-control']) !!}</td>
        </tr>
        <tr>
            <td>User Created</td><td>{!! Form::text('user_created',Auth::user()->name,['class'=>'form-control','disabled']) !!}</td>
        </tr>
        <tr>
            <td colspan="2">{!! Form::submit('Simpan data', ['class'=>'btn btn-primary']) !!} {!! link_to('admin/matpel','Kembali', ['class'=>'btn btn-primary']) !!}</td>
        </tr>
    </table>
    {!! Form::close() !!}
@stop