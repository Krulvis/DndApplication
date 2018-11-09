@extends('layouts.app')

@section('content')
    <div class="campaigns-overview">
        <table>
            <tbody>
            <tr>
                <th>Campaign Name</th>
                <th>Role</th>
            </tr>
            <td>{{$campaign}}</td>
            {{--@foreach($campaigns as $campaign)--}}
            {{--<tr>--}}
            {{--<td>{{$campaign->title}}</td>--}}
            {{--<td>{{$campaign->role}}</td>--}}
            {{--</tr>--}}
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
@endsection