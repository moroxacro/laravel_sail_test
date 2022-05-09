@extends('layouts.app')

@section('title', '新規登録 - laraCake')

@section('content')

<main  class="container flex-fill py-4 my-4 border shadow p-3 mb-5 bg-white rounded" style="max-width:500px;">
    <form action="" method="post" class="form">
        <input type="hidden" name="action" value="submit" />
        <dl>
        <div class="d-flex bd-highlight align-items-center">
            <!-- <div class="p-2 flex-fill bd-highlight">
                <dt class="dt"></dt>
                    <dd>
                        <img class="rounded-circle" src="../member_picture/<?php //echo htmlspecialchars($_SESSION['join']['image'], ENT_QUOTES); ?>" width="170" height="170" alt="" />
                    </dd>
            </div> -->
            <div class="p-2 flex-fill bd-highlight form2">
                <dt class="dt">ユーザ名</dt>
                <dd>
                    <input type="text" name="name"  class="form-control" id="floatingPassword" placeholder="Password" max-width="50%" value="<?php if(!empty($_POST))echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>" />
                    <?php //echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?>
                </dd>
                <dt class="dt">メールアドレス</dt>
                <dd>
                    <?php //echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?>
                </dd>
                <dt class="dt">パスワード</dt>
                <dd>
                    <?php //echo htmlspecialchars($_SESSION['join']['password'], ENT_QUOTES); ?>
                </dd>
            </div>
        </div>           
            
            
        </dl>
        <div><button type="submit" class="btn btn-outline-primary">登録する</button></div>
    </form>
    </main>
@endsection