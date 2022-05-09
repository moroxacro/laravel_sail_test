@extends('layouts.app')

@section('title', 'ログイン｜laraCake')


@section('content')
<main class="container flex-fill py-4 my-4 border shadow p-3 mb-5 bg-white rounded" style="max-width:500px;">
  <h2>ログイン</h2>
  <p>{{$msg}}</p>
    <form action="/login" method="post"  class="mt-3">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value=""/>
          <label for="floatingInput">メール入力</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value=""/>
          <label for="floatingPassword">パスワード入力</label>
        </div>
            
        <div class="my-3 form-check form-switch">
          <label class="form-check-label"><input type="checkbox" name="save" class="form-check-input" checked/>次回から自動ログイン</label>
        </div>

        <div class="d-flex justify-content-between">
          <input type="submit" value="送信" class="btn border border-secondary bg-white text-primary"/>
          <a href="/admin" class="btn btn-outline-secondary">会員登録画面へ移動</a>
        </div>
    </form>
</main>
@endsection