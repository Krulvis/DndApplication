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
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Stock Name</td>
                <td>Stock Price</td>
                <td>Weight</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            {{-- @if($items) --}}
            @foreach($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->weight}}</td>
                    <td><a href="{{ route('items.edit',$item->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('items.destroy', $item->id)}}" method="post">
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
    </div>
@endsection