<x-app-layout>
    <x-slot name="title">
        投稿ページ｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    
        <div class="container gedf-wrapper">
            <div class="row">
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
                            <a href="/dictionary/1" class="nav__link nav-link-faded has-icon active">Laravelの概要</a>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="/dictionary/1/2" class="nav__link__md nav-link-faded has-icon active">Laravelとは</a>
                                    <ul>
                                        <li>
                                            <a href="/dictionary/1/2/1" class="nav__link__sm nav-link-faded has-icon active">Laravelの特徴</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/2/2" class="nav__link__sm nav-link-faded has-icon active">開発情報</a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="list-group-item">
                                    <a href="/dictionary/1/3" class="nav__link__md nav-link-faded has-icon active">環境構築</a>
                                    <ul>
                                        <li>
                                            <a href="/dictionary/1/3/1" class="nav__link__sm nav-link-faded has-icon active">Laravel Sailを利用した環境構築</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/3/2" class="nav__link__sm nav-link-faded has-icon active">Homesteadを利用した環境構築</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    <a href="/dictionary/1/4" class="nav__link__md nav-link-faded has-icon active">最初のアプリケーション</a>
                                    <ul>
                                        <li>
                                            <a href="/dictionary/1/4/1" class="nav__link__sm nav-link-faded has-icon active">Laravelのディレクトリ構成</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/4/2" class="nav__link__sm nav-link-faded has-icon active">Welcomeページの処理</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/4/3" class="nav__link__sm nav-link-faded has-icon active">はじめてのページ</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/4/4" class="nav__link__sm nav-link-faded has-icon active">はじめてのテストコード</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/4/5" class="nav__link__sm nav-link-faded has-icon active">ユーザー登録の実装</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/4/6" class="nav__link__sm nav-link-faded has-icon active">ユーザー認証</a>
                                        </li>
                                        <li>
                                            <a href="/dictionary/1/4/7" class="nav__link__sm nav-link-faded has-icon active">イベント</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-8 gedf-main">
    
                    <!--- \\\\\\\Post-->
                    <div class="card gedf-card shadow">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="col-lg-12 mt-3">
                                    <h1>{{ $posts->first()->title }}</h1>
                                    <p>{{ $posts->first()->post }}</p>
                                </div>
                            </div>
                            @foreach ($posts as $post)
                                <div class="card-body">
        
                                    <h4 class="card-text">
                                        {{ $post->title }}
                                    </h4>
                                    <p class="card-text">
                                        {{ $post->post }}
                                    </p>
        
                                </div>
                            @endforeach
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('dictionary') }}" enctype="multipart/form-data">
                                @csrf
                                <h6 class="form-txt mb-3">「{{ $posts->first()->title }}」について書き込む</h6>

                                <input type="hidden" name="id" value="{{ $id }}">

                                
                                <!-- タイトル -->
                                <div>
                                    <x-label for="title" value="タイトル" />

                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                                </div>
                                <!-- 投稿内容 -->
                                <div class="mt-4">  
                                    <x-label for="t_message" value="投稿テキスト" />
                  
                                    <x-textarea id="t_message" class="block mt-1 w-full" name="message"  value="{{ old('message') }}" placeholder="" rows="10"></x-textarea>
                                </div>
                                <!-- 写真 -->
                                {{-- <div class="mt-4">
                                    <div>
                                        <x-label for="image" value="画像" />
    
                                        <x-file-upload id="formFile" class="block mt-1 w-full" type="file" name="image" autofocus />
                                    </div>
                                </div> --}}
                    
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4">
                                        {{ __('投稿') }}
                                    </x-button>
                                </div>
                            </form>    
                        </div>
                    </div>
                    <!-- Post /////-->
                </div>
            </div>
        </div>
    <!-- footer -->
    <x-footer/>
</x-app-layout>