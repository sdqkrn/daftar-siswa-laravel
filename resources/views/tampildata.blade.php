@extends('layout.admin')

@section('content')
<body class="bg-dark">
  

  <div class="container">
      
      <div class="row justify-content-center">
         <div class="col-8">
          <h2 class="text-center text-white  mb-5">Edit Data Siswa</h2>
          <div class="card ml-5">
            <div class="card-body">
              <form action="/updatedata/{{ $data->id }}" method="POST" entcype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama lengkap</label>
                  <input type="taxt" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Jenis kelamin :</label>
                  <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                    <option selected>{{ $data->jeniskelamin }}</option>
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                   
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">No telepon</label>
                  <input type="number" name="notelepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $data->notelepon }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
           </div>
         </div>
      </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
@endsection