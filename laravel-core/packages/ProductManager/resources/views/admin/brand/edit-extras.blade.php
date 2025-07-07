<x-app-layout>  
  <div class="row">
    
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Brand</h3>
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
          {!! Form::open(['route'=>['admin.brandextradetail.update', $brandextradetail->id], 'method'=>'put']) !!}
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
                    <div class="row">
                <div class="form-group col-6">
                  <label for="exampleInputPassword1">Country</label>
                  <div class="select2-purple sortable-option"  data-options="{{$country}}" data-selected-options="">
                  {{ Form::select('country', $country, $brandextradetail->country->id, ['class'=>'form-control','placeholder' => 'Select Country...']) }}
                  </div>
                </div>
                <div class="form-group col-6">
                  <label>Brand</label>
                  <div class="select2-purple sortable-option" data-options="{{$brand}}" data-selected-options="">
                  {{ Form::select('brand', $brand, $brandextradetail->brand->id, ['class'=>'form-control','placeholder' => 'Select Brand...']) }}
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Text</label>
                {{ Form::textarea('text', json_decode($brandextradetail->text), ['class'=>'form-control','placeholder'=>'Enter text', 'rows'=>6] ) }}
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Slider</label>
                {{ Form::textarea('slider', json_decode($brandextradetail->slider), ['class'=>'form-control','placeholder'=>'Enter slider', 'rows'=>6] ) }}
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                
              {{ Form::submit('Submit',['class'=>"btn btn-primary"]); }}
              <a href="{{ route('admin.brandextradetail.index') }}" class="btn btn-warning">Cancel</a>
              
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
        
      </div>
    </div>
  <!-- /.row -->
  @push('scripts')
    <script type="text/javascript">
        $( function() {  });
      </script>
    @endpush
</x-app-layout>