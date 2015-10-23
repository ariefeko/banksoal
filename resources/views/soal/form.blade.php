        <tr><td width="200">ID Mata Pelajaran</td><td>{!! Form::text('mata_pelajaran_id',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pertanyaan</td><td>{!! Form::text('pertanyaan',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan A</td><td>{!! Form::text('pilihan_a',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan B</td><td>{!! Form::text('pilihan_b',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan C</td><td>{!! Form::text('pilihan_c',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan D</td><td>{!! Form::text('pilihan_d',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan E</td><td>{!! Form::text('pilihan_e',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Jawaban</td><td>{!! Form::text('jawaban',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>User Created</td><td>{!! Form::text('user_created',null,['class'=>'form-control','disabled']) !!}</td></tr>
        <tr><td>Gambar</td><td>{!! Form::file('gambar', null, ['class'=>'form-control']) !!}</td></tr>