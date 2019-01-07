@extends('layouts.app')

@section('content')
    <div>
        <h1>{{$campaign->title}}</h1>
        <h1>Items</h1>
    </div>
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
                <td>Quantity</td>
                <td>Owned by</td>
                <td>Carried by</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($items->get() as $item)
                <tr>
                    <td><a href="{{route('items.edit',$item->info()->id)}}">{{$item->info()->name}}</a></td>
                    <td>{{$item->info()->price}}</td>
                    <td>{{$item->info()->weight}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->owner()->name}}</td>
                    <td>{{$item->carrier()->name}}</td>
                    <td><a href="{{ route('items.edit',$item->info()->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('items.destroy', $item->info()->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection