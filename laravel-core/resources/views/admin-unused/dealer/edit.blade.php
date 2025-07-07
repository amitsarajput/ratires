<x-app-layout>
  <a href="{{ route('admin.dealer.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left "></i> Back</a>  
  <div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Dealer</h3>
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
          {!! Form::open(['route'=>['admin.dealer.update',$id],'method'=>'put']) !!}
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
                <div class="form-group col-md-3">
                  <label for="name">Name</label>
                  {{ Form::text('name', $dealer['name'], ['id'=>'name','class'=>'form-control','placeholder'=>'Enter Name'] ) }}
                </div>      
                <div class="form-group col-md-3">
                  <label for="address">Address</label>
                  {{ Form::text('address', $dealer['address']??'', ['id'=>'address','class'=>'form-control','placeholder'=>'Enter Address'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="city">City</label>
                  {{ Form::text('city', $dealer['city']??'', ['id'=>'city','class'=>'form-control','placeholder'=>'Enter City'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="state">State</label>
                  {{ Form::text('state', $dealer['state']??'', ['id'=>'state','class'=>'form-control','placeholder'=>'Enter State'] ) }}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="country">Country</label>
                  {{ Form::text('country', $dealer['country']??'', ['id'=>'country','class'=>'form-control','placeholder'=>'Enter Country'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="countrycode">Country Code</label>
                  {{ Form::text('countrycode', $dealer['countrycode']??'', ['id'=>'countrycode','class'=>'form-control','placeholder'=>'Enter Country Code'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="postal">Postal</label>
                  {{ Form::text('postal', $dealer['postal']??'', ['id'=>'postal','class'=>'form-control','placeholder'=>'Enter Postal'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="phone">Phone</label>
                  {{ Form::text('phone', $dealer['phone']??'', ['id'=>'phone','class'=>'form-control','placeholder'=>'Enter phone'] ) }}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="lat">Lat</label>
                  {{ Form::text('lat', $dealer['lat']??'', ['id'=>'lat','class'=>'form-control','placeholder'=>'Enter latitude'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="lng">Lng</label>
                  {{ Form::text('lng', $dealer['lng']??'', ['id'=>'lng','class'=>'form-control','placeholder'=>'Enter latitude'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="direciton">Direciton</label>
                  {{ Form::text('direciton', $dealer['direciton']??'', ['id'=>'direciton','class'=>'form-control','placeholder'=>'Enter direciton'] ) }}
                </div>
                <div class="form-group col-md-3">
                  <label for="Continent">Continent</label>
                  {{ Form::select('continent', $continents, $dealer['continent']??'', ['id'=>'Continent','class'=>'form-control'] ) }}
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="email">Email</label>
                  {{ Form::text('email', $dealer['email']??'', ['id'=>'email','class'=>'form-control','placeholder'=>'Enter email'] ) }}
                </div>
                <div class="form-group col-md-12">
                  <label for="addresspreview">Address Preview</label>
                  {{ Form::textarea('addresspreview', $dealer['addresspreview']??'', ['id'=>'addresspreview','class'=>'form-control','placeholder'=>'Enter address preview','rows'=>'3'] ) }}
                </div>
                
                <div class="form-group col-3">
                    <label for="publish">Red</label>
                    {{ Form::checkbox('featured', 1, $dealer['featured'], ['id'=>'publish']) }}
                  </div>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                
                {{ Form::submit('Submit',['class'=>"btn btn-primary"]); }}
                <a href="{{ route('admin.dealer.index') }}" class="btn btn-warning">Cancel</a>
              
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