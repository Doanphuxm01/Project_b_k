@extends('admin.layouts.master')

@section('show')

@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-11">
        <table id="datatable paginationWrapper" class="table table-hover table-bordered table-striped">
          <h3 style="text-align: center;">Danh sách kho sách </h3>
            <thead>
              <tr>
                <th scope="col ">ID</th>
                <th scope="col">tên sách </th>
                <th scope="col">loại sách </th>
                <th scope="col">chi tiết </th>
                <th scope="col">tác giả </th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $key)
                <tr>
                  <td>{{ $key->id }}</td>
                  <td>{{ $key->name }}</td>
                  <td>{{ $key->booktype->booktype }}</td>
                  <td>{{ $key->detail }}</td>
                  <td>{{ $key->author }}</td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
     
    </div>
  </div>
  
@endsection