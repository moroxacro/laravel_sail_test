<x-app-layout>

    <x-slot name="title">
        投稿ページ｜laraCake
    </x-slot>
    <!-- header -->
    <x-header/>
    
        <div class="container gedf-wrapper">
            <div class="row">

                <!-- side menu -->
                <x-sidebar-dictionary/>
    
                {{-- main contents --}}
                <div class="col-md-8 gedf-main">
                    <div class="card gedf-card shadow">
                        <div class="card-body">
                            <div class="container mt-3">
                                <div class="col-lg-12">
                                    <p class="main-text dictionary-title">{{ $post_first->title }}</p>
                                    <p class="mb-3">{{ $post_first->post }}</p>
                                </div>
                            </div>
                            <div class="container mt-5">
                                @foreach ($posts as $post)        
                                    <p class="card-text dictionary-sub-title">
                                        {{ $post->sub_title }}
                                    </p>
                                    <p class="card-text">
                                        {{ $post->post }}
                                    </p>
                                @endforeach
                            </div>

                            <div class="container mt-5">
                            <strong>関連するワード：</strong>
                                <ul>
                                    @foreach ($links as $link)
                                    <li><a class="nav__link__sm" href="/dictionary{{ $link->path }}">{{ $link->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="container mt-5">
                                @if (Auth::check())
                                <form method="POST" action="{{ route('dictionary') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h6 class="form-txt mb-3">＊「{{ $post_first->title }}」について書き込む</h6>
    
                                    <input type="hidden" name="path" value="{{ $path }}">
                                    <input type="hidden" name="path_length" value="{{ $path_length }}">
    
                                    
                                    <!-- タイトル -->
                                    <div>
                                        <x-label for="title" value="タイトル" />
    
                                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required placeholder="記事のタイトル" autofocus />
                                    </div>
                                    <!-- 投稿内容 -->
                                    <div class="mt-4">  
                                        <x-label for="t_message" value="投稿テキスト" />
                      
                                        <x-textarea id="t_message" class="block mt-1 w-full" name="message"  value="{{ old('message') }}" required placeholder="ここに記事を入力します" rows="10"></x-textarea>
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
                                @else
                                    <h6 class="form-txt mb-3">＊「{{ $post_first->title }}」について書き込むためには、ログインが必要です。</h6>
                                @endif
                            </div>

                        </div>   
                    </div>
                </div>

            </div>
        </div>

    <!-- footer -->
    <x-footer/>
</x-app-layout>