@extends('layout.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Siswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <a href="/tambahsiswa"  class="btn btn-primary">Tambah +</a>
        <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
      <form class="d-flex" role="search">
        <form action="{{ route('siswa') }}" method="GET">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      </form>

       </form>
      </div>
     </nav>
        <div class="row">

            {{-- @if($message=Session::get('success'))
            <div class="alert alert-success" role="alert">{{ $message }}</div>

            @endif --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Notelepon</th>
                    <th scope="col">Dibuat</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach($data as $index => $row)


                  <tr>
                    <th scope="row">{{ $index + $data->firstItem()}}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->jeniskelamin }}</td>
                    <td>{{ $row->notelepon }}</td>
                    <td>{{ $row->created_at->format(' D M Y') }}</td>
                    <td><a href="/tampilkandata/{{ $row->id }}"  class="btn btn-info">Edit</a>
                        <a href="#"  class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
                        </td>


                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{ $data->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
<script>
$('.delete').click(function(){
    var siswaid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama')
    swal({
title: "Yakin dek?",
text: "Kamu Akan Menghapus Data Siswa Dengan Nama "+nama+"",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
window.location ="/delete/"+siswaid+""
swal("Data Berhasil Dihapus", {
  icon: "success",
});
} else {
swal("Data Tidak Jadi Dihapus!");
}
});

})

</script>
<script>
@if (Session::has('success'))
toastr.success("{{ Session::get('success') }}")
@endif
</script>
@endpush

@endsection