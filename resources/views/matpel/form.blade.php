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
            @if (isset($matapelajaran)) <?php $nama = $matapelajaran->user_created; ?> @else <?php $nama=Auth::user()->name; ?> @endif
            <td>User Created</td><td>{!! Form::text('user_created',$nama,['class'=>'form-control','enabled']) !!}</td>
        </tr>