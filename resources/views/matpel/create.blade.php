@extends('template.master')
@section('content')
    {!! Form::open(array('url'=>'admin/matpel')) !!}
    <table class="table table-bordered">
        @include('matpel.form')
        <tr>
            <td colspan="2">{!! Form::submit('Simpan data', ['class'=>'btn btn-primary']) !!} {!! link_to('admin/matpel','Kembali', ['class'=>'btn btn-primary']) !!}</td>
        </tr>
    </table>
    {!! Form::close() !!}
@stop