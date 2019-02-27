@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('crud.update', $crud->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name :</label>
          <input type="text" class="form-control" name="name" value={{ $crud->name }} />
        </div>
        <div class="form-group">
          <label for="price">Address :</label>
          <input type="text" class="form-control" name="address" value={{ $crud->address }} />
        </div>
        <div class="form-group">
          <label for="quantity">Email :</label>
          <input type="text" class="form-control" name="email" value={{ $crud->email }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection