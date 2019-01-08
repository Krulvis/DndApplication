@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Editing {{$item->info()->name}}.
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
            <form method="post"
                  action="{{ route('campaigns.items.update', ['campaign' => $campaign,'item' => $item]) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Quantity:</label>
                    <input type="text" class="form-control" name="share_name" value="{{ $item->quantity }}"/>
                </div>
                <div class="form-group">
                    <label for="owner">Owner:</label>
                    <select>
                        <option value="{{$item->owner()->name}}" disabled selected>{{$item->owner()->name}}</option>
                        @foreach($campaign->users()->get() as $user)
                            <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="carrier">Carried by:</label>
                    <select>
                        <option value="{{$item->carrier()->name}}" disabled selected>{{$item->carrier()->name}}</option>
                        @foreach($campaign->users()->get() as $user)
                            <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection