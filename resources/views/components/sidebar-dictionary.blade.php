<div class="col-md-4">
    <div class="card shadow">
        <div class="card-body ">
            @if (Auth::check())  
                <div class="mr-2">
                    <img class="rounded-circle" width="40" height="40" src="/storage/{{ Auth::user()->profile_image }}" alt="">
                </div>
                <div class="ml-2"> 
                    <div class="h5">{{ Auth::user()->name }}</div>
                    <div class="h7 text-muted">{{ Auth::user()->email }}</div>
                </div>
            @else
                <div class="mr-2">
                    <img class="rounded-circle" width="40" height="40" src="/storage/person-circle.svg" alt="">
                </div>
                <div class="ml-2">
                    <div class="h5">名無しさん</div>
                    <div class="h7 text-muted">※ログインして投稿しよう！</div>
                </div>
            @endif
        </div>
    </div>
    <!--- article lists -->
    <div class="card shadow mt-3">
        <div class="card-body">
            <div>
                <a href="/dictionary/1" class="nav__link nav-link-faded has-icon active">Laravelの概要</a>
                <a href="/dictionary/1" class="nav__link nav-link-faded has-icon active">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                </a>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/dictionary/1/2" class="nav__link__md nav-link-faded has-icon active">Laravelとは</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    <ul>
                        <li>
                            <a href="/dictionary/1/2/5" class="nav__link__sm nav-link-faded has-icon active">Laravelの特徴</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/2/6" class="nav__link__sm nav-link-faded has-icon active">開発情報</a>
                        </li>
                    </ul>

                </li>
                <li class="list-group-item">
                    <a href="/dictionary/1/3" class="nav__link__md nav-link-faded has-icon active">環境構築</a>
                    <ul>
                        <li>
                            <a href="/dictionary/1/3/7" class="nav__link__sm nav-link-faded has-icon active">Laravel Sailを利用した環境構築</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/3/8" class="nav__link__sm nav-link-faded has-icon active">Homesteadを利用した環境構築</a>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="/dictionary/1/4" class="nav__link__md nav-link-faded has-icon active">最初のアプリケーション</a>
                    <ul>
                        <li>
                            <a href="/dictionary/1/4/9" class="nav__link__sm nav-link-faded has-icon active">Laravelのディレクトリ構成</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/4/10" class="nav__link__sm nav-link-faded has-icon active">Welcomeページの処理</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/4/11" class="nav__link__sm nav-link-faded has-icon active">はじめてのページ</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/4/12" class="nav__link__sm nav-link-faded has-icon active">はじめてのテストコード</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/4/13" class="nav__link__sm nav-link-faded has-icon active">ユーザー登録の実装</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/4/14" class="nav__link__sm nav-link-faded has-icon active">ユーザー認証</a>
                        </li>
                        <li>
                            <a href="/dictionary/1/4/15" class="nav__link__sm nav-link-faded has-icon active">イベント</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>