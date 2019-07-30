@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <table id="datatable paginationWrapper" class="table table-hover table-bordered table-striped">
          <h3 style="text-align: center;">Bảng các loại sách</h3>
            <thead>
              <tr>
                <th scope="col ">stt</th>
                <th scope="col">id</th>
                <th scope="col">loại sách</th>
                <th scope="col">thực hiện</th>
              </tr>
            </thead>
            <tbody></tbody>

        </table>
      </div>
      <div class="col-md-4">
        <form >
          <h3 style="text-align: center;">action</h3>
          <div class="form-group myid">
            <label>ID</label>
            <input type="number" id="id" class="form-control" readonly="readonly">
          </div>
          <div class="form-group">
            <label>loại sách</label>
            <input  type="text" id="booktype" class="form-control">
            <span id="error" class="error mt-2 d-lg-block w-100" style="font-size: 14px; margin-left: 18px; color: #ff7675!important;"></span>
          </div>
          <button id="save" type="button" onclick="addbook()" class="btn btn-primary">thêm loại sách </button>
          <button id="update" type="button" onclick="editbook()" class="btn btn-warning">sửa loại sách </button>
        </form>
      </div>
    </div>
  </div>
<script type="text/javascript">
   
    $('#datatable').DataTable();
    $('#save').show();
    $('#update').hide();
    $('.myid').hide();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  // $('edit').click(){
  //   $('').hide('')
  // }
  function viewData(){
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "adminview/booktype",
        success:function(response){
          var rows = "";
          $.each(response,function(key,value){
            rows = rows + "<tr>";
            rows = rows + "<td>"+key+++"</td>";
              rows = rows + "<td>"+value.id+"</td>";
              rows = rows + "<td>"+value.booktype+"</td>";
              rows = rows + "<td width='200'>";
              rows = rows + "<button type='button' class='btn btn-info'  onclick='editData("+value.id+")'>sửa</button>";
              rows = rows + "<button type='button' style='margin-left: 36px' class='btn btn-danger' onclick='deleteData("+value.id+")'>xóa</button>";
              rows = rows + "</td>";
            rows = rows + "</tr>";
          });
          $('tbody').html(rows);
        }
      })
    }
    viewData();
  function addbook(){
      $('#error').hide();
      var booktype = $('#booktype').val();
      $.ajax({
        type: 'POST',
        dataType:'json',
        data: {booktype:booktype},
        url: "adminview/booktype",
        success:function(response){
          toastr.success(response.success, 'Thông báo', {timeOut: 8000});
          viewData();
          ClearData();
          $('#save').show();
        },
      //   error:function(data) {
      //      console.log(data);
      //       let error = $.parseJSON(data.responseText);
      //       $('#error').show();
      //       $('#error').text(error.errors.name);
           
      // }
      })
    }
    function ClearData(){
      $('#id').val('');
      $('#booktype').val('');
    }
    function editData(id){
      $('#save').hide();
      $('#update').show();
      $('.myid').show();
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "adminview/booktype/"+id+"/edit",
        success:function(response){
          $('#id').val(response.id);
          $('#booktype').val(response.booktype);
        }
      })
    }
    function editbook(){
      var id = $('#id').val();
      var booktype = $('#booktype').val();
      $.ajax({
        type: "PUT",
        dataType:"json",
        data: {
          booktype:booktype
        },
        url:'adminview/booktype/'+id,
        success:function(response){
        console.log(response);
        toastr.success(response.success, 'Thông báo', {timeOut: 8000});
          viewData();
          ClearData();
          $('#save').show();
          $('#update').hide();
          $('.myid').hide();
        }
      })
    }
    function deleteData(id){
      $.ajax({
        type:"DELETE",
        dataType:"json",
        url: "adminview/booktype/"+ id,
        success:function(response){
          toastr.success(response.success, 'Thông báo', {timeOut: 8000});
          viewData();
        }
      })
    }
</script>
@endsection