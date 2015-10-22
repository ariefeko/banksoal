@extends('template.master')
@section('content')
    {!! Form::model($matapelajaran,array('url'=>'admin/matpel/'.$matapelajaran->id, 'method'=>'patch', 'files'=>'true')) !!}
        <table class="table">
            @include('matpel.form')
            <tr>
                <td colspan=2>{!! Form::submit('Simpan Data', ['class'=>'btn btn-primary']) !!}
                              {!! link_to('admin/matpel', 'Kembali', ['class'=>'btn btn-primary']) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}
@stop