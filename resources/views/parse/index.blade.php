@extends('layouts.app')

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
          <td>Stock Name</td>
          <td>Stock Price</td>
          <td>Stock Quantity</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        {{-- @if($parses) --}}
        @foreach($parses as $parse)
        <tr>
            <td>{{$parse->id}}</td>
            <td>{{$parse->parse_name}}</td>
            <td>{{$parse->parse_price}}</td>
            <td>{{$parse->parse_qty}}</td>
            <td><a href="{{ route('parse.edit',$parse->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('parse.destroy', $parse->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        {{-- @else --}}
        <p>nothing</p>
        {{-- @endif --}}
    </tbody>
  </table>
<div>
@endsection