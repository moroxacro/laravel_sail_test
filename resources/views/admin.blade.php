@extends('layouts.app')

@section('title', '会員登録｜laraCake')

@section('content')

<main class="container flex-fill py-4 my-4 border shadow p-3 mb-5 bg-white rounded" style="max-width:500px;">


<p>会員登録</p>
<form action="/admin" method="post" enctype="multipart/form-data" class="container mw-500px" >

    <dl>
        <div class="form-floating mb-3">
            <label for="floatingPassword">ユーザー名</label>
            <input type="text" name="name"  class="form-control" id="floatingPassword" placeholder="Password" max-width="50%" value="<?php if(!empty($_POST))echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>" />
        </div>
        <div class="form-floating mb-3">
            <input type="email"  name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php if(!empty($_POST))echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>"/>
            <label for="floatingInput">メールアドレス</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password"  class="form-control" id="floatingPassword" placeholder="Password" value="<?php if(!empty($_POST))echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>"/>
            <label for="floatingPassword">パスワード</label>
        </div>
        <dt class="center"><label for="formFile" class="form-label">画像</label></dt>
        <dd>
            <div class="mb-3">
                <input class="form-control" type="file" id="formFile"  name="image" />
            </div>
        </dd>
    </dl>
    <div class=button><button type="submit" class="btn btn-outline-primary">会員情報を登録する</button></div>
</form>
</main>
@endsection