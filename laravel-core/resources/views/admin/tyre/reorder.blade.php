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
          {!! Form::open(['route'=>['admin.tyre.reorder'],'method'=>'post']) !!}
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

                      {{ Form::select('country', $country, $input_data['country'], ['class'=>'form-control','placeholder' => 'Select Country...']) }}
                  </div>
                  <div class="form-group  col-3">
                      <label>Brand</label>
                      {{ Form::select('brand', $brand, $input_data['brand'], ['class'=>'form-control','placeholder' => 'Select Brand...']) }}
                  </div>
                  <div class="form-group col-3">
                      <label>Search tag</label>
                      {{ Form::select('searchtag', $searchtag, $input_data['searchtag'], ['class'=>'form-control','placeholder' => 'Select Search Tag...']) }}
                  </div>
                  <div class="form-group col-3">
                      <label style="display: block;">&nbsp;</label>
                      {{ Form::submit('Submit',['class'=>"btn btn-primary"]); }}
                  </div>

                </div>
              <div class="row">
                <div class="col-4">
                  @if (count($tyres))
                    <div class="sortable" data-metadata='{"action":"reorder-tyre","table":"tyres","column":"order"}' data-url="{{ route('admin.ajax.request',['table'=>'tyres'] ) }}">
                      @foreach ($tyres as $key=>$value)
                        <div class="callout callout-info mb-1" id="{{$key}}">{{ $value }}</div>
                      @endforeach
                    </div>
                    <a href="#" class="btn btn-sm btn-primary save-order-button mt-2">Save Order</a>
                  @endif
                </div>
              </div>
                
                <div class="row">
                  
                </div>
                
                <div class="row">
                  
                </div>
                
                <div class="row">
                  
                </div>
                
                <div class="row">
                  
                </div>
                

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                
                {{ Form::submit('Submit',['class'=>"btn btn-primary"]); }}
                <a href="{{ route('admin.tyre.reorder') }}" class="btn btn-warning">Cancel</a>
              
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