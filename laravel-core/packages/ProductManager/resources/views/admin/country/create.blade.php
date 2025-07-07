<x-app-layout>  
  <div class="row">
    
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Country</h3>
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
          {!! Form::open(['route'=>'admin.countri.store']) !!}
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
                <div class="form-group">
                    <label>Region</label>
                    {{ Form::select('region', $region, null, ['class'=>'form-control','placeholder' => 'Pick a region...']) }}
                </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                {{ Form::text('name', '', ['class'=>'form-control','placeholder'=>'Enter Name'] ) }}
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Code</label>
                {{ Form::text('code', '', ['class'=>'form-control','placeholder'=>'Enter CODE'] ) }}
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Locale Code</label>
                {{ Form::text('locale_code', '', ['class'=>'form-control','placeholder'=>'Enter Locale CODE'] ) }}
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                {{ Form::text('slug', '', ['class'=>'form-control','placeholder'=>'Enter Slug'] ) }}
              </div>
              <div class="form-group">
                  <label>Brand</label>
                  <div class="select2-purple sortable-option" data-options="{{$brand}}" data-selected-options="">
                    {{ Form::select('brand[]', $brand, null, ['multiple' => true, 'class'=>'select2 form-control', 'data-dropdown-css-class'=>'select2-purple']) }}
                  </div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Search Tags</label>
                <div class="select2-purple sortable-option"  data-options="{{$search_tags_all}}" data-selected-options="">
                  {{ Form::select('search_tags[]', $search_tags_all, null, ['multiple'=>'true','class'=>'form-control select2', 'data-dropdown-css-class'=>'select2-purple'] ) }}
                </div>
              </div>
              <div class="form-group">
                <label for="Order">Order</label>
                {{ Form::number('order', 0, ['id'=>'Order','class'=>'form-control','placeholder'=>''] ) }}
              </div>
              
              <div class="form-group col-3">
                <label for="published">Publish</label>
                {{ Form::checkbox('published', 1, '', ['id'=>'published']) }}
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                
                {{ Form::submit('Submit',['class'=>"btn btn-primary"]); }}
                <a href="{{ route('admin.countri.index') }}" class="btn btn-warning">Cancel</a>
              
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