<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link href="{{ asset('css/dataTables.bootstrap.css') }}">
	<link href="{{ asset('css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<table id="datatable" class="table table-hover table-bordered table-striped">
					  <thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Name</th>
					      <th scope="col">Detail</th>
					      <th scope="col">Author</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody></tbody>
				</table>
			</div>
			<div class="col-md-4">
				<form >
					<div class="form-group myid">
						<label>ID</label>
						<input type="number" id="id" class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Detail</label>
						<textarea id="detail" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" id="author" class="form-control">
					</div>
					<button id="save" type="button" onclick="saveData()" class="btn btn-primary">submit</button>
					<button id="update" type="button" onclick="updateData()" class="btn btn-warning">Update</button>
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
							rows = rows + "<button type='button' class='btn btn-info'  onclick='editData("+value.id+")'>edit</button>";
							rows = rows + "<button type='button' style='margin-left: 36px' class='btn btn-danger' onclick='deleteData("+value.id+")'>delete</button>";
							rows = rows + "</td>";
						rows = rows + "</tr>";
					});
					$('tbody').html(rows);
				}
			})
		}
		viewData();
	function saveData(){
			var name = $('#name').val();
			var detail = $('#detail').val();
			var author = $('#author').val();
			$.ajax({
				type: 'POST',
				dataType:'json',
				data: {name:name,detail:detail,author:author},
				url: "adminview/cruds",
				success:function(response){
					viewData();
					ClearData();
					$('#save').show();
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
					viewData();
					ClearData();
					$('#save').show();
					$('#update').hide();
					$('.myid').hide();
					toastr.success($result.success, 'thông báo', {timeOut: 10000});
					$('#edit').modal('hide');
				}
			})
		}
		function deleteData(id){
			$.ajax({
				type:"DELETE",
				dataType:"json",
				url: "adminview/cruds/"+ id,
				success:function(response){
					viewData();
				}
			})
		}
</script>
</body>
</html>