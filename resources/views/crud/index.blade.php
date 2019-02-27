@extends('layout')

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>

<div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Address</td>
            <td>Email</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($crud as $data)
          <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->address}}</td>
              <td>{{$data->email}}</td>
              <td><a href="{{ route('crud.edit',$data->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('crud.destroy', $data->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
  @endsection