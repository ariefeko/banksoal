        <script type="text/javascript">
            var data = <?php echo json_encode($listmatpel); ?>;
            $(document).ready(function() {
              $("#listmatapelajaran").select2({
                data: data
              })
            });
        </script>
        <tr>
            <td width="200">ID Mata Pelajaran</td><td>
                {!! Form::select('mata_pelajaran_id',$listmatpel,null,['id'=>'listmatapelajaran','class'=>'form-control']) !!}
            </td>
        </tr>
        <tr><td>Pertanyaan</td><td>{!! Form::textarea('pertanyaan',null,['id'=>'mytextarea','class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan A</td><td>{!! Form::text('pilihan_a',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan B</td><td>{!! Form::text('pilihan_b',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan C</td><td>{!! Form::text('pilihan_c',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan D</td><td>{!! Form::text('pilihan_d',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Pilihan E</td><td>{!! Form::text('pilihan_e',null,['class'=>'form-control']) !!}</td></tr>
        <tr><td>Jawaban</td><td>{!! Form::text('jawaban',null,['class'=>'form-control']) !!}</td></tr>
        @if (isset($soal)) <?php $nama = $soal->user_created; ?> @else <?php $nama=Auth::user()->name; ?> @endif
        <tr><td>User Created</td><td>{!! Form::text('user_created',$nama,['class'=>'form-control','enabled']) !!}</td></tr>
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