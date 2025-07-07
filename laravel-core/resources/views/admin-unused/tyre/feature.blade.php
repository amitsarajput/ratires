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
          {!! Form::open(['route'=>['admin.tyre.feature',$tyre->id],'method'=>'put','files' => true]) !!}
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
                    
            <div class="row ">
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
                $features=json_decode($tyre->features_benifits, true);
                //$title=$features['title'];
                //$description=$features['description'];
                //$image=$features['image'];
                //dd($features);
              @endphp

            </div>
            
                
              <div class="row sortable features">
                @if(!empty($features))
                  @foreach($features as $feature)
                    <div class="form-group feature col-4">
                      <div class="tright">
                          {{-- $feature --}}
                        <button type="button" class="btn btn-tool" data-feature-widget="add">
                          <i class="fas fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-feature-widget="remove">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <label for="exampleInputEmail1">Name</label>
                      {{ Form::text('title[]', $feature['title'], ['class'=>'form-control','placeholder'=>'Title'] ) }}
                      <label for="exampleInputEmail1">Description</label>
                      {{ Form::textarea('description[]', $feature['description'], ['class'=>'form-control','placeholder'=>'Description','rows'=>3] ) }}
                      <div class="row">
                        <div class="col-8">
                          <label for="exampleInputPassword1">Image</label>
                          {{ Form::file('image[]', ['class'=>'form-control','placeholder'=>'Enter Description'] ) }}
                        </div>
                        <div class="col-3">
                          <div class="images_preview">
                              @if(isset($feature['image']))
                              <img class="image" src=" {{asset('storage/features/'.$feature['image'])}}  " alt="">
                              @endif
                            </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @else
                <div class="form-group feature col-4">
                  <div class="tright">
                    <button type="button" class="btn btn-tool" data-feature-widget="add">
                      <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-feature-widget="remove">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <label for="exampleInputEmail1">Name</label>
                  {{ Form::text('title[]', '', ['class'=>'form-control','placeholder'=>'Title'] ) }}
                  <label for="exampleInputEmail1">Description</label>
                  {{ Form::textarea('description[]', '', ['class'=>'form-control','placeholder'=>'Description','rows'=>3] ) }}
                  <div class="row">
                    <div class="col-8">
                      <label for="exampleInputPassword1">Image</label>
                      {{ Form::file('image[]', ['class'=>'form-control','placeholder'=>'Enter Description'] ) }}
                    </div>
                    <div class="col-3">
                      <div class="images_preview">
                          <img class="image" src=" {{asset('storage/features/noimage.webp')}}  " alt="">
                        </div>
                    </div>
                  </div>
                </div>
                @endif
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
        $( function() {  });
      </script>
  @endpush
</x-app-layout>