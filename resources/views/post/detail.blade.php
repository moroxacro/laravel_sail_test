<x-app-layout>
    <x-slot name="title">
        投稿ページ｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    
        <div class="container gedf-wrapper">
            <div class="row">
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body ">

                            @if (Auth::check())  
                            <div class="mr-2">
                                <img class="rounded-circle" width="45" height="45" src="" alt="">
                            </div>
                            <div class="ml-2"> 
                                <div class="h5">{{ Auth::user()->name }}</div>
                                <div class="h7 text-muted">{{ Auth::user()->email }}</div>
                            </div>
                            @else
                            <div class="mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>                        
                            </div>
                            <div class="ml-2">
                                <div class="h5">名無しさん</div>
                                <div class="h7 text-muted">※ログインして投稿しよう！</div>
                            </div>
                            @endif
                        </div>
                            @if (Auth::check())  
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="" class="nav__link nav-link-faded has-icon active">アカウント情報</a>
                                </li>
                            </ul>
                            @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="/register" class="nav__link nav-link-faded has-icon active">新規登録</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/login" class="nav__link nav-link-faded has-icon">ログイン</a>
                                </li>
                            </ul>
                            @endif
                    </div>
                </div>
    
                <div class="col-md-9 gedf-main">
                    <!--- \\\\\\\Post-->
                    <div class="card gedf-card shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="35" height="35" src="../storage/person-circle.svg" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0">{{ $post->user_name }}</div>
                                        <div class="text-muted h7"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <h5 class="card-text">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text">
                                {{ $post->post }}
                            </p>

                            @if ($post_image)
                            <img src="../storage/{{ $post_image->image }}">
                            @endif

                            <p class="text-muted h6">{{ $post->category }}</p>

                        </div>
                    </div>
                </div> 

            </div>
        </div>
    <!-- footer -->
    <x-footer/>
</x-app-layout>