        <tr><td width="200">ID Mata Pelajaran</td><td>{!! Form::text('mata_pelajaran_id',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pertanyaan</td><td>{!! Form::text('pertanyaan',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan A</td><td>{!! Form::text('pilihan_a',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan B</td><td>{!! Form::text('pilihan_b',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan C</td><td>{!! Form::text('pilihan_c',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan D</td><td>{!! Form::text('pilihan_d',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan E</td><td>{!! Form::text('pilihan_e',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Jawaban</td><td>{!! Form::text('jawaban',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>User Created</td><td>{!! Form::text('user_created',null,['class'=>'form-control','enabled']) !!}</td></tr>
        <tr><td>Gambar</td><td>
        @if (isset($soal))
                @if (!empty($soal->gambar))
                        <?php $url = asset('gambar/'.$soal->gambar); ?>
                        <img src="{{ asset('gambar/'.$soal->gambar) }}" width="300">
                @else
                        <img src="{{ asset('gambar/'.'No_image_available.jpg') }}" width="300">
                @endif
                {!! Form::file('gambar', null, ['class'=>'form-control']) !!}
        @else
                {!! Form::file('gambar', null, ['class'=>'form-control']) !!}
        @endif
        </td></tr>

        {{-- <tr><td>Gambar</td><td><span>{!! ($soal->gambar) ? Html::image('/gambar/'.$soal->gambar,null,array('width' => '200')) : Html::image(asset('gambar/No_image_available.jpg'),null,array('width'=>'100')) !!}</span> <span>{!! Form::file('gambar', null, ['class'=>'form-control']) !!}</span></td></tr> --}}