@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Share
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
      <form method="post" action="{{ route('parse.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Description:</label>
              <input type="text" class="form-control" name="body"/>
          </div>
          <div class="form-group">
              <label for="price">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="quantity">Weight:</label>
              <input type="text" class="form-control" name="weight"/>
          </div>
          <div class="form-group">
              <label for="quantity">Price:</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Misc:</label>
              <input type="text" class="form-control" name="misc"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection