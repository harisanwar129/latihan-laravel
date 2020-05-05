<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dosen</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container" style="margin-top:30px;">
        <h1>Data Dosen</h1>
           @if (session('added_success'))
           <!--ALERT-->
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{session('added_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
           @endif
    <div class="container" style="margin-top:30px;">
           @if (session('edited_success'))
           <!--ALERT-->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('edited_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
           @endif
        <button class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
        <br>
        <br>
           @if (session('deleted_success'))
           <!--ALERT-->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('deleted_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
           @endif
  
  

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <td>No</td>
                    <td>Nidn</td>
                    <td>Nama</td>
                    <td>Status</td>
                    <td>Keterangan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach($dosens as $dosen)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$dosen->nidn}}</td>
                        <td>{{$dosen->nama}}</td>
                        <td class="text-center">
                        @if($dosen->status==1)
                            Aktif
                            @else
                            Tidak Aktif
                            @endif
                        </td>
                        <td>{{$dosen->keterangan}}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" id="btn-edit-dosen"
                        data-toggle="modal" data-target="#editModal"
                        data-nidn="{{$dosen->nidn}}"
                        data-nama="{{$dosen->nama}}"
                        data-status="{{$dosen->status}}"
                        data-keterangan="{{$dosen->keterangan}}"
                        >Edit</button>
                        <button type="button" class="btn btn-danger" id="btn-delete-dosen"
                        data-toggle="modal" data-target="#deleteModal"
                        data-nidn="{{$dosen->nidn}}"
                        >Delete</button>
                        </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
       <hr>
       <h1>Ricle Bin</h1>
         <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#emptyModal" 
                        >Empty</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#restoreAllModal" 
                        >Restore All</button>
                        </div>                   
        <table class="table table-bordered">
        <br/>
        <br/>
            <thead>
                <tr class="text-center">
                    <td>No</td>
                    <td>Nidn</td>
                    <td>Nama</td>
                    <td>Status</td>
                    <td>Keterangan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach($trash as $del)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$del->nidn}}</td>
                        <td>{{$del->nama}}</td>
                        <td class="text-center">
                        @if($del->status==1)
                            Aktif
                            @else
                            Tidak Aktif
                            @endif
                        </td>
                        <td>{{$del->keterangan}}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-success" id="btn-restore-dosen"
                        data-toggle="modal" data-target="#restoreModal"
                        data-nidn="{{$del->nidn}}"
                        >Restore</button>
                        <button type="button" class="btn btn-danger" id="btn-force-delete-dosen"
                        data-toggle="modal" data-target="#forceDeleteModal"
                        data-nidn="{{$del->nidn}}"
                        >Delete</button>
                        </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <!--container-->
<!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="{{action('DosenController@store')}}">
            @csrf
                <div class="form-group">
                    <label >Nidn</label>
                    <input type="number" name="nidn" class="form-control" required>
                </div>     
                <div class="form-group">
                    <label >Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>     
                <div class="form-group">
                    <label >Keterangan</label>
                    <textarea type="number" name="keterangan" class="form-control" required>
                    </textarea>
                </div>         
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--MODAL-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="{{action('DosenController@update','update')}}">
            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label >Nidn</label>
                    <input type="number" name="nidn" class="form-control" id="edit-nidn"required readonly>
                </div>     
                <div class="form-group">
                    <label >Nama</label>
                    <input type="text" name="nama" class="form-control" id="edit-nama"required>
                </div>     
                <div class="form-group">
                    <label >Status</label>
                    <select class="form-control" name="status" id="edit-status"required>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>     
                <div class="form-group">
                    <label >Keterangan</label>
                    <textarea type="number" name="keterangan" class="form-control" id="edit-keterangan"required>
                    </textarea>
                </div>         
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Apakah anda yakin akan mengahapus data tersebut?
            <form method="post" action="{{action('DosenController@destroy','delete')}}">
            @method('DELETE')
            @csrf
                    <input type="hidden" name="nidn" id="delete-nidn">
                </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>   
<!--MODAL -->
<div class="modal fade" id="emptyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Empty data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Apakah anda yakin akan mengahapus seluruh data tersebut?
            <form method="post" action="{{action('DosenController@emptyAll')}}">
     
            @csrf
                          
                </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Empty</button>
        </form>
      </div>
    </div>
  </div>
</div>  
<!--MODAL  -->
<div class="modal fade" id="restoreAllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resotore Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Apakah anda yakin akan mengembalikan seluruh   data tersebut?
            <form method="post" action="{{action('DosenController@restoreAll')}}">
     
            @csrf 
                              
                </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Restore</button>
        </form>
      </div>
    </div>
  </div>
</div>    
<!--MODAL-->
<div class="modal fade" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Restore Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Apakah anda yakin akan mengembalikan   data tersebut?
            <form method="post" action="{{action('DosenController@restore')}}">
     
            @csrf 
               <input type="hidden" name="nidn" id="restore-nidn">        
                </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Restore</button>
        </form>
      </div>
    </div>
  </div>
</div>    
<!--MODAL-->
<div class="modal fade" id="forceDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Apakah anda yakin akan menghapus   data tersebut?
            <form method="post" action="{{action('DosenController@forceDelete')}}">
     
            @csrf 
                 <input type="hidden" name="nidn" id="force-delete-nidn">  
                </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>    
 <script src="{{asset('js/app.js')}}"></script>
 <script>
   $(document).on('click','#btn-edit-dosen',function(){
     let nidn=$(this).data('nidn');
    //  DENGAN JS
//      let nama=$(this).data('nama');
//      let keterangan=$(this).data('keterangan');
//     let status=$(this).data('status');
//  $('#edit-nidn').val(nidn);
//  $('#edit-nama').val(nama);
//  $('#edit-keterangan').text(keterangan);
//  $('#edit-status option').filter(function(){
//      return ($(this).val()==status);
//  }).prop('selected', true);   
// DENGAN AJAX
$.ajax({
    type:"get",
    url:"dosen/"+nidn,
    dataType:"json",
    success:function(res){
        // console.log(res);
 $('#edit-nidn').val(res[0].nidn);
 $('#edit-nama').val(res[0].nama);
 $('#edit-keterangan').text(res[0].keterangan);
 $('#edit-status option').filter(function(){
     return ($(this).val()==res[0].status);
 }).prop('selected', true);  
    }
});
 });
  $(document).on('click','#btn-delete-dosen',function(){
      let nidn=$(this).data('nidn');
 $('#delete-nidn').val(nidn);
  });
  $(document).on('click','#btn-restore-dosen',function(){
      let nidn=$(this).data('nidn');
 $('#restore-nidn').val(nidn);
  });
  $(document).on('click','#btn-force-delete-dosen',function(){
      let nidn=$(this).data('nidn');
 $('#force-delete-nidn').val(nidn);
  });
 </script>   
</body>
</html>