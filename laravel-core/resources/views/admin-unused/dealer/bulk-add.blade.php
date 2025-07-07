<x-app-layout>
  
  <div class="row">
    <div class="col-md-12">      
      <a href="./dealer" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left "></i> Back</a> 
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
          {!! Form::open(['route'=>['admin.dealer.bulkadd'],'method'=>'put','files' => true]) !!}
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
                  <div class="form-group col-12">
                      <label for="exampleInputPassword1">Download</label>
                      <a href="{{ asset('/storage/xlsx/'.$old_file) }}" download>Download Old File</a>
                  </div>
                  <div class="form-group col-12">
                      <label for="exampleInputPassword1">Sizes</label>
                      {{ Form::file('dealers', ['class'=>'form-control'] ) }}
                  </div>
                  <div class="form-group col-12">
                      <label for="publish">Delete All Existing Dealers</label> 
                      {{ Form::checkbox('rmdlexist', 1, '', ['id'=>'publish']) }}
                  </div>
                </div>
              <div class="row">
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
        $( function(){});
      </script>
  @endpush
  
</x-app-layout>