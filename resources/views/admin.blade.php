@extends('layouts.app')

@section('title', '会員登録')

@section('content')
<form action="/admin" method="post">
    <table>
        @csrf
        <tr>
            <th>名前：</th>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <th>メールアドレス：</th>
            <td><input type="text" name="mail"></td>
        </tr>
        <tr>
            <th>パスワード：</th>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection