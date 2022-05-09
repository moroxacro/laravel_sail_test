@extends('layouts.app')

@section('title', '新規登録 - laraCake')

@section('content')

<main class="container flex-fill py-4 my-4 border shadow p-3 mb-5 bg-white rounded" style="max-width:500px;">


<p>会員登録</p>
<form action="/admin" method="post" enctype="multipart/form-data" class="container mw-500px" >
@csrf
    <dl>
        <label for="floatingPassword">ユーザー名</label>
        <div class="form mb-3">
            <input type="text" name="name" class="form-control" placeholder="<?php if(isset($_POST['name'])) { $name = $_POST['name']; echo $name; } ?>"/>
            @if ($errors->has('name'))
            <p class="error">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <label for="floatingInput">メールアドレス</label>
        <div class="form mb-3">
            <input type="email" name="email" class="form-control" placeholder=""/>
            @if ($errors->has('email'))
            <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <label for="floatingPassword">パスワード</label>
        <div class="form mb-3">
            <input type="password" name="password"  class="form-control" placeholder=""/>
            @if ($errors->has('password'))
            <p class="error">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <!-- <dt class="center"><label for="formFile" class="form-label">画像</label></dt>
        <dd>
            <div class="mb-3">
                <input class="form-control" type="file" id="formFile"  name="image" />
            </div>
        </dd> -->
    </dl>
    <div class=button><button type="submit" class="btn btn-outline-secondary">会員情報を登録する</button></div>
</form>
</main>
@endsection