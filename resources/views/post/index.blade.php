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

                        <div class="card-body">
                            <form method="POST" action="{{ route('post') }}" enctype="multipart/form-data">
                                @csrf
                                <dt class="form-txt mb-3">{{ Auth::user()->name }}さん、メッセージをどうぞ</dt>
                                
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
                                <div class="mt-4">
                                    <div>
                                        <x-label for="image" value="画像" />
    
                                        <x-file-upload id="formFile" class="block mt-1 w-full" type="file" name="image" autofocus />
                                    </div>
                                </div>
                                <!-- カテゴリー -->
                                <div class="mt-4">
                                    <div>
                                        <x-label for="category" value="カテゴリー" />
    
                                        <input type="checkbox" name="category[]" value="Eloquent">#Eloquent<br>
                                        <input type="checkbox" name="category[]" value="クエリビルダ">#クエリビルダ<br>
                                        <input type="checkbox" name="category[]" value="マイグレーション">#マイグレーション<br>
                                        <input type="checkbox" name="category[]" value="シーダー">#シーダー<br>
                                    </div>
                                </div>
                    
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