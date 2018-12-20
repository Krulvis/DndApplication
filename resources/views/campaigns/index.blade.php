@extends('layouts.app')

@section('content')
    <div class="campaigns-overview">
        <table>
            <tbody>
            <tr>
                <th>Campaign Name</th>
                <th>Role</th>
            </tr>
            @foreach($campaigns as $campaign)

                <tr>
                    <td>
                        <a href="{{ route('campaigns.show', $campaign->id)}}">
                            {{$campaign->title}}
                        </a>
                    </td>
                    <td>{{$campaign->role}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection