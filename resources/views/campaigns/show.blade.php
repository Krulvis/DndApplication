@extends('layouts.app')

@section('content')
    <div>
        <h1>{{$campaign->title}}</h1>
        <a href="{{ route('campaign.items', $campaign->id)}}"><h1>Items</h1></a>
    </div>
@endsection