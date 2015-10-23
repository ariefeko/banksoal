@extends('template.master')
@section('content')
    {!! Form::open(array('url'=>'admin/soal','files'=>'true')) !!}
    <table class="table table-bordered">
        @include('soal.form')
        <tr>
            <td colspan="2">{!! Form::submit('Simpan data', ['class'=>'btn btn-primary']) !!} {!! link_to('admin/soal','Kembali', ['class'=>'btn btn-primary']) !!}</td>
        </tr>
    </table>
    {!! Form::close() !!}
@stop