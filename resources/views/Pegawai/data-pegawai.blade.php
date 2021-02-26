
<!DOCTYPE html>
<html>
<head>
  @include('Template/head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('Template/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{route('create-pegawai')}}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
                    <!-- target="_blank" untuk membuka tab baru -->
                    <a href="{{route('cetak-pegawai')}}" target="_blank" class="btn btn-primary">Cetak Data <i class="fas fa-print"></i></a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Alamat</th>
                      <th>Tanggal Lahir</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach($data_pegawai as $view)
                    <tr>
                      <th>{{ $loop->iteration }}</th>
                      <th>{{ $view->nama }}</th>
                      <th>{{ $view->jabatan->jabatan }}</th>
                      <th>{{ $view->alamat }}</th>
                      <th>{{ date('d-m-Y', strtotime($view->tgl_lahir)) }}</th>
                      <th>
                        <a href="{{ url('edit-pegawai', $view->id) }}"><i class="fas fa-edit" style="color:yellow"></i></a> | 
                        <a href="{{ url('delete-pegawai', $view->id) }}"><i class="fas fa-trash-alt" style="color:red"></i></a>
                      </th>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
              {{$data_pegawai->links()}}
            </div>
        </div>
        @include('sweetalert::alert')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('Template/footer')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('Template/script')



</body>
</html>
