@extends('admin.layouts.master')

@section('title')

@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <table id="datatable paginationWrapper" class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col ">ID</th>
                <th scope="col">tên sách </th>
                <th scope="col">chi tiết </th>
                <th scope="col">tác giả </th>
                <th scope="col">hành động </th>
              </tr>
            </thead>
            <tbody></tbody>
           {{--   {{ $post->links() }} --}}
        </table>
         
      </div>
      <div class="col-md-4">
        <form >
          <div class="form-group myid">
            <label>ID</label>
            <input type="number" id="id" class="form-control" readonly="readonly">
          </div>
          <div class="form-group">
            <label>tên sách</label>
            <input type="text" id="name" class="form-control">
            <span id="error" class="error mt-2 d-lg-block w-100" style="font-size: 14px; margin-left: 18px; color: #ff7675!important;"></span>
          </div>
          <div class="form-group">
            <label>chi tiết </label>
            <textarea id="detail" class="form-control"></textarea>
           <span id="error2" class="error mt-2 d-lg-block w-100" style="font-size: 14px; margin-left: 18px; color: #ff7675!important;"></span>
          </div>
          <div class="form-group">
            <label>tác giả</label>
            <input type="text" id="author" class="form-control">
           <span id="error3" class="error mt-2 d-lg-block w-100" style="font-size: 14px; margin-left: 18px; color: #ff7675!important;"></span>
          </div>
          <button id="save" type="button" onclick="saveData()" class="btn btn-primary">thêm</button>
          <button id="update" type="button" onclick="updateData()" class="btn btn-warning">sửa</button>
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
        url: "adminview/cruds",
        success:function(response){
          var rows = "";
          $.each(response,function(key,value){
            rows = rows + "<tr>";
              rows = rows + "<td>"+value.id+"</td>";
              rows = rows + "<td>"+value.name+"</td>";
              rows = rows + "<td>"+value.detail+"</td>";
              rows = rows + "<td>"+value.author+"</td>";
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
  function saveData(){
      $('#error').hide();
      $('#error2').hide();
      $('#error3').hide();
      var name = $('#name').val();
      var detail = $('#detail').val();
      var author = $('#author').val();
      $.ajax({
        type: 'POST',
        dataType:'json',
        data: {name:name,detail:detail,author:author},
        url: "adminview/cruds",
        success:function(response){
          toastr.success(response.success, 'Thông báo', {timeOut: 8000});
          viewData();
          ClearData();
          $('#save').show();

        },
        error:function(data) {
           console.log(data);
            let error = $.parseJSON(data.responseText);
            $('#error').show();
            $('#error2').show();
            $('#error3').show();
            $('#error').text(error.errors.name);
            $('#error2').text(error.errors.detail);
            $('#error3').text(error.errors.author);
           
   }
      })
    }
    function ClearData(){
      $('#id').val('');
      $('#name').val('');
      $('#detail').val('');
      $('#author').val('');
    }
    function editData(id){
      $('#save').hide();
      $('#update').show();
      $('.myid').show();
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "adminview/cruds/"+id+"/edit",
        success:function(response){
          console.log('a');
          $('#id').val(response.id);
          $('#name').val(response.name);
          $('#detail').val(response.detail);
          $('#author').val(response.author);
         
        }
      })
    }
    function updateData(){
      var id = $('#id').val();
      var name = $('#name').val();
      var detail = $('#detail').val();
      var author = $('#author').val();
      $.ajax({
        type: "PUT",
        dataType: "json",
        data: {name:name,detail:detail,author:author},
        url : 'adminview/cruds/'+id,
        success:function(response){
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
        url: "adminview/cruds/"+ id,
        success:function(response){
          toastr.success(response.success, 'Thông báo', {timeOut: 8000});
          viewData();
        }
      })
    }
    // ajax phan trang 
    $('.pagination a').unbind('click').on('click', function(e) {
             e.preventDefault();
             var page = $(this).attr('href').split('page=')[1];
             getPosts(page);
       });
       function getPosts(page)
       {
            $.ajax({
                 type: "GET",
                 url: '?page='+ page
            })
            .success(function(data) {
                 $('body').html(data);
            });
       }
</script>
@endsection