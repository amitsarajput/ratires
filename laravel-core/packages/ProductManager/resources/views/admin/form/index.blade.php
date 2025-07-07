<x-app-layout> 
  @push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  @endpush  
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <h5 class="card-title">data</h5>

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
        <div class="card-body">
          
          @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif
          
          
          <div class="row">
            
            
          <div class="col-md-12">
              <a href="{{route('admin.forms.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create</a>
              <a href="{{ asset('/storage/xlsx/'.$old_file) }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download XL</a>
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach ($forms as $row)
                    <tr>
                      <td>{{ strtoupper($row->type ) }}</td>
                      <td>{{ json_decode($row->form_data, true)['name']??null }}</td>
                      <td>
                        {{ json_decode($row->form_data, true)['email']??null }}
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning">Action</button>
                          <button type="button" class="btn btn-warning dropdown-toggle dropdown-data" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('admin.forms.edit', $row->id) }}">Edit</a>
                            <form action="{{ route('admin.forms.destroy', $row->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="#" class="dropdown-item" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                <i class="fa fas fa-trash"></i> Delete
                              </a>
                            </form>
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

  </div>
  <!-- /.row -->
  @push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
      $(function () {
        $('#datatable').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
  @endpush
</x-app-layout>