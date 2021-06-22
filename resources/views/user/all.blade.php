@extends('base')

@section('content')

@dump($users)

<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
<table>

@endsection