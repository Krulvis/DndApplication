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
                </div><br/>
            @endif
            <form method="post" action="{{ route('items.update', $item->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="share_name" value="{{ $item->name }}"/>
                </div>
                <div class="form-group">
                    <label for="price">Price :</label>
                    <input type="text" class="form-control" name="share_price" value="{{ $item->price }}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Weight:</label>
                    <input type="text" class="form-control" name="share_qty" value="{{ $item->weight}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection