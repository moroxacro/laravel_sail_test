<html lang="jp">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- jQuery読み込み -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- headerのCSS読み込み -->
    <link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
</head>
<header>
  <div class="collapse" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">投稿しよう</h4>
          <p class="">趣味や好きなゲームなど、あなたに関する情報を追加しましょう。いくつかの文を書いておくと、共通の趣味を持つ友人を見つける手助けになるかもしれません。</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">アカウント</h4>

          <?php if(isset($_SESSION['id'])){
            $login = 'on';
            $logout = 'off';
          } else {
            $login = 'off';
            $logout = 'on';
          }
          ?>
          
          <ul class="list-unstyled <?php echo $login;?>">
            <li><a href="/plusultra/user_edit.php" class="text-white">アカウント情報</a></li>
            <li><a href="/plusultra/join/logout.php" class="text-white">ログアウト</a></li>
          </ul>
          
          <ul class="list-unstyled <?php echo $logout;?>">
            <li><a href="/admin" class="text-white">会員登録</a></li>
            <li><a href="/login" class="text-white">ログイン</a></li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark shadow-sm">
    <div class="container">
      <!-- 下記コードは消さないで下さい。ログイン時はpost.php 非ログイン時はindex.phpへ遷移 --> 
      <?php if(isset($_SESSION['id'])){
        $urlpass = 'post.php';
      } else {
        $urlpass = 'index.php';
      }
      ?> 
      <a href="/<?php echo $urlpass;?>" class="navbar-brand d-flex align-items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gift" viewBox="0 0 16 16">
        <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z"/>
      </svg>     
      <strong>LaraCake</strong>  
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<body>
    <div class="content">
        @yield('content')
    </div>
    @component('components.footer')
    @endcomponent
</body>
</html>

