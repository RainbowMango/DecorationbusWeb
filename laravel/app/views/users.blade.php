@extends('layout')

@section('content')
    Users!
    @foreach($users as $user)
        <p>用户ID：{{ $user->id }}</p>
        <p>用户邮箱：{{ $user->email }}</p>
        <p>用户名字：{{ $user->name }}</p>
    @endforeach
@stop