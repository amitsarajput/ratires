<x-app-layout>
  
<a href="{{ route('admin.tyre.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left "></i> Back</a>
  
  <div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
          <h3 class="card-title">Search Tag</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <a href="#" class="dropdown-item">Action</a>
                  <a class="dropdown-divider"></a>
                  <a href="#" class="dropdown-item">Separated link</a>
                </div>
              </div>
                <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          {!! Form::open(['route'=>['admin.tyre.size',$tyre->id],'method'=>'put','files' => true]) !!}
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                    
                <div class="row">
                  <div class="form-group col-3">
                      <label>Country</label>
                      <p>{{ $tyre->country->name }}</p>
                    </div>
                  <div class="form-group  col-3">
                      <label>Brand</label>
                      <p>{{ $tyre->brand->name }}</p>
                    </div>
                  <div class="form-group col-3">
                      <label>Search tag</label>
                      <p>{!! htmlspecialchars_decode($tyre->preview_name) !!}</p>
                  </div>
                  <div class="form-group col-3">
                      <label>Search tag</label>
                      <p>{{ $tyre->slug }}</p>
                  </div>
                  
                  @php
                      $tyre_sizes=json_decode($tyre->sizes, true);
                      $sizes=$tyre_sizes['sizes']??null;
                      $extra_cols=$tyre_sizes['extra_cols']??[];
                      $legends=$tyre_sizes['legends']??'';
                  @endphp

                </div>
                <div class="row">
                  <div class="form-group col-4">
                      <label for="exampleInputPassword1">Download</label>
                      <a href="{{ asset('storage/xlsx/'.$old_file) }}" download>Download Old File</a>
                  </div>
                  <div class="form-group col-4">
                      <label for="exampleInputPassword1">Sizes</label>
                      {{ Form::file('sizes', ['class'=>'form-control','placeholder'=>'Enter Description'] ) }}
                  </div>
                </div>
              <div class="row">
                  <div class="form-group col-12">
                    <label for="exampleInputEmail1">Extra Columns: </label>
                    <label for="s_w">{{ Form::checkbox('extra_cols[]', 's_w', array_key_exists('s_w', $extra_cols), ['id'=>'s_w']); }} S.W.</label>
                    <label for="weather">{{ Form::checkbox('extra_cols[]', 'weather', array_key_exists('weather', $extra_cols), ['id'=>'s_w']); }} Weather</label>
                    <label for="fuel">{{ Form::checkbox('extra_cols[]', 'fuel', array_key_exists('fuel', $extra_cols), ['id'=>'fuel']); }} Fuel</label>
                    <label for="noise_db">{{ Form::checkbox('extra_cols[]', 'noise_db', array_key_exists('noise_db', $extra_cols), ['id'=>'noise_db']); }} Noise</label>
                    <label for="eulabel">{{ Form::checkbox('extra_cols[]', 'eulabel', array_key_exists('eulabel', $extra_cols), ['id'=>'eulabel']); }} EU Label</label>
                  </div>
                <div class="form-group col-12">
                    <label>legends</label>
                    {{ Form::textarea('legends', $legends, ['class'=>'form-control','placeholder'=>'Enter Description', 'rows'=>6] ) }}
                </div>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                
                {{ Form::submit('Submit',['class'=>"btn btn-primary"]); }}
                <a href="{{ route('admin.tyre.index') }}" class="btn btn-warning">Cancel</a>
              
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
        
      </div>
    </div>
  <!-- /.row -->
  @push('scripts')
    <script type="text/javascript">
        $( function(){});
      </script>
  @endpush
  
</x-app-layout>