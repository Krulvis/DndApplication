@extends('layouts.app')

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
      <form method="post" action="{{ route('parse.update', $parse->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Share Name:</label>
          <input type="text" class="form-control" name="share_name" value={{ $parse->share_name }} />
        </div>
        <div class="form-group">
          <label for="price">Share Price :</label>
          <input type="text" class="form-control" name="share_price" value={{ $parse->share_price }} />
        </div>
        <div class="form-group">
          <label for="quantity">Share Quantity:</label>
          <input type="text" class="form-control" name="share_qty" value={{ $parse->share_qty }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection