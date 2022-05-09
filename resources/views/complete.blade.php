@extends('layouts.app')

@section('title', '登録完了 - laraCake')

@section('content')
<style>
.complete {
    display: block;
    width: 100%;
    height: 300px;
    text-align: center;
    padding-bottom: 30px;
}
</style>
<main class="container flex-fill py-4 my-4 border shadow p-3 mb-5 bg-white rounded" style="max-width:500px;">
    <div class="complete">
        <p>ユーザー登録が完了しました</p>
        <a href="/login" class="btn border border-primary bg-white text-primary">ログイン</a>
    </div>    
</main> 
@endsection