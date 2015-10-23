@extends('template.master')
@section('content')
    {!! Form::model($soal,array('url'=>'admin/soal/'.$soal->id, 'method'=>'patch', 'files'=>'true')) !!}
        <table class="table">
            @include('soal.form')
            <tr>
                <td colspan=2>{!! Form::submit('Simpan Data', ['class'=>'btn btn-primary']) !!}
                              {!! link_to('admin/soal', 'Kembali', ['class'=>'btn btn-primary']) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}
@stop