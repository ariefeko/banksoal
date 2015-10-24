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
            <td>User Created</td><td>{!! Form::text('user_created',Auth::user()->name,['class'=>'form-control','enabled']) !!}</td>
        </tr>