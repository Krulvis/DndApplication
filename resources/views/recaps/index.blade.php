@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hier komen recaps</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('recaps.create') }}"> Create New Recap</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="800px">Details</th>
            <th>Created At</th>
            <th width="20px">Action</th>
        </tr>
        @foreach ($recaps as $recap)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $recap->name }}</td>
            <td>{{ $recap->detail }}</td>
            <td>{{ $recap->created_at }}</td>
            <td>
                <form action="{{ route('recaps.destroy',$recap->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('recaps.show',$recap->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('recaps.edit',$recap->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $recaps->links() !!}
      
@endsection