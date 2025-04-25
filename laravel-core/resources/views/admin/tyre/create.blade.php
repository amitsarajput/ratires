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
          {!! Form::open(['route'=>'admin.tyre.store','files' => true]) !!}
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
                  <label>Region</label>
                  {{ Form::select('region', $region, '', ['class'=>'form-control','placeholder' => 'Select region...']) }}
                </div>
                <div class="form-group col-6">
                    <label>Country</label>
                    {{ Form::select('country', $country, '', ['class'=>'form-control','placeholder' => 'Select Country...']) }}
                </div>
              </div>
              <div class="row">

                  <div class="form-group  col-3">
                      <label>Brand</label>
                      {{ Form::select('brand', $brand, '', ['class'=>'form-control','placeholder' => 'Select Brand...']) }}
                  </div>
                  <div class="form-group col-3">
                      <label>Search tag</label>
                      {{ Form::select('searchtag', $searchtag, '', ['class'=>'form-control','placeholder' => 'Select Search Tag...']) }}
                  </div>
                  <div class="form-group col-3">
                      <label>Season</label>
                      {{ Form::select('season', $season, '', ['class'=>'form-control','placeholder' => 'Select Search Tag...']) }}
                  </div>

              </div>
              <div class="row">
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Category</label>
                    <div class="select2-purple sortable-option" data-options="{{$tyrecategory}}" data-selected-options="">
                      {{ Form::select('tyrecategory[]', $tyrecategory, '' ,['multiple' => true, 'class'=>'select2 form-control', 'data-dropdown-css-class'=>'select2-purple'] ) }}
                    </div>
                  </div>
                <div class="form-group col-6">
                    <label>Icon</label>
                    <div class="select2-purple sortable-option" data-options="{{$icon}}" data-selected-options="">
                      {{ Form::select('icon[]', $icon, '', ['multiple' => true, 'class'=>'select2 form-control', 'data-dropdown-css-class'=>'select2-purple']) }}
                    </div>
                  </div>
              </div>
                
                <div class="row">
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Name</label>
                    {{ Form::text('name', '', ['class'=>'form-control','placeholder'=>'Name'] ) }}
                    <label for="exampleInputEmail1">Preview Name</label>
                    {{ Form::text('previewname', '', ['class'=>'form-control','placeholder'=>'Preview Name'] ) }}
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleInputPassword1">Slug</label>
                    {{ Form::text('slug', '', ['class'=>'form-control','placeholder'=>'Enter Slug'] ) }}
                    <label for="exampleInputPassword1">Exernal Link (if any)</label>
                    {{ Form::text('externallink ', '', ['class'=>'form-control','placeholder'=>'External Link '] ) }}
                  </div>
                  
                  <div class="form-group col-3">
                    <label for="premium_tyre">Premium Tyre</label>
                    {{ Form::checkbox('premium_tyre', 1, '', ['id'=>'premium_tyre']) }}
                  </div>
                  <div class="form-group col-3">
                    <label for="publish">Publish</label>
                    {{ Form::checkbox('publish', 1, '', ['id'=>'publish']) }}
                  </div>
                </div>
                
              <div class="row">
                <div class="form-group col-12">
                  <label for="exampleInputPassword1">Description</label>
                  {{ Form::textarea('description', '', ['class'=>'form-control','placeholder'=>'Enter Description'] ) }}
                </div>
              </div><div class="row">
                  <div class="form-group col-4">
                    <label for="exampleInputPassword1">Catalog Image</label>
                    {{ Form::file('catalogue_image', ['class'=>'form-control','placeholder'=>'Enter Description'] ) }}
                  </div>
                  <div class="form-group col-8">
                    <div class="images_preview no-sort">
                      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group col-4">
                    <label for="exampleInputPassword1">Product Images</label>
                    {{ Form::file('product_images[]', ['multiple' => true, 'class'=>'form-control','placeholder'=>'Enter Description'] ) }}
                  </div>
                  <div class="form-group col-8">
                    <div class="images_preview sortable" data-metadata='{"action":"reorder-product-images","table":"tyres","column":"product_images" }'  data-url="{{ route('admin.ajax.request',['table'=>'tyres']) }}" >
                      
                    </div>
                    <a href="#" class="btn btn-sm btn-primary save-order-button">Save Order</a>
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
        $( function() {  });
      </script>
  @endpush
</x-app-layout>