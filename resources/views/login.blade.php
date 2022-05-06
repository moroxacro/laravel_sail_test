@extends('layouts.app')

@section('title', 'index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>{{$msg}}</p>
    <form action="/login" method="post">
        <table>
            @csrf
            <!-- <tr>
                <th>名前：</th>
                <td><input type="text" name="name"></td>
            </tr> -->
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