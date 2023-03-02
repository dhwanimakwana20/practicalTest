@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary btn-lg">Add</button> 
    <div class="row justify-content-center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">UPC</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>jjgj</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
          
    </div>
</div>
@endsection
