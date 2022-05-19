<x-app-layout>

    <x-slot name="title">
        辞書ページ｜laraCake
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
                                    @if (isset($posts) && !(is_null($posts)))
                                        <p class="main-text dictionary-title">{{ $posts[0]->title }}</p>
                                    @else
                                        <p class="main-text dictionary-title">ようこそ、Laravel辞書へ</p>
                                    @endif
                                </div>
                            </div>
                            <div class="container mt-5">
                                @if (isset($posts) && !(is_null($posts)))
                                    @foreach ($posts as $post)        
                                        <p class="card-text dictionary-sub-title">
                                            {{ $post->sub_title }}
                                        </p>
                                        <p class="card-text">
                                            {{ $post->post }}
                                        </p>
                                    @endforeach
                                @endif
                            </div>

                            <div class="container mt-5">
                                @if (isset($links) && !(is_null($links)))
                                    @foreach ($links as $link)
                                    <li><a class="nav__link__sm" href="/dictionary2/{{ $path_id }}/{{ $link->id }}">{{ $link->title }}</a></li>
                                    @endforeach
                                @endif

                                @if (Auth::check())
                                    <button type="button" class="btn btn-primary btn-sm mt-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                        </svg>
                                        新しいテーマを追加する
                                    </button>
                                @endif
                                <!-- モーダル本体 -->
                                <div class="modal-container">
                                    <div class="modal-body">
                                        <!-- 閉じるボタン -->
                                        <div class="modal-close">×</div>
                                        <!-- モーダル内のコンテンツ -->
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('dictionary') }}" enctype="multipart/form-data">
                                                @csrf                
                                                {{-- <input type="hidden" name="path" value="{{ $path }}">
                                                <input type="hidden" name="path_length" value="{{ $path_length }}"> --}}
                
                                                
                                                <!-- 新規テーマ -->
                                                <div>
                                                    <x-label for="title" value="新しいテーマ" />
                
                                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required placeholder="記事のタイトル" autofocus />
                                                </div>
                                                <!-- 投稿内容 -->
                                                <div class="mt-4">  
                                                    <x-label for="t_message" value="投稿テキスト" />
                                  
                                                    <x-textarea id="t_message" class="block mt-1 w-full" name="message"  value="{{ old('message') }}" required placeholder="ここに記事を入力します" rows="10"></x-textarea>
                                                </div>
                                    
                                                <div class="flex items-center justify-end mt-4">
                                                    <x-button class="ml-4">
                                                        {{ __('投稿') }}
                                                    </x-button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(function(){
                                        // 変数に要素を入れる
                                        var open = $('.btn'),
                                            close = $('.modal-close'),
                                            container = $('.modal-container');

                                        //開くボタンをクリックしたらモーダルを表示する
                                        open.on('click',function(){	
                                            container.addClass('active');
                                            return false;
                                        });

                                        //閉じるボタンをクリックしたらモーダルを閉じる
                                        close.on('click',function(){	
                                            container.removeClass('active');
                                        });

                                        //モーダルの外側をクリックしたらモーダルを閉じる
                                        $(document).on('click',function(e) {
                                            if(!$(e.target).closest('.modal-body').length) {
                                                container.removeClass('active');
                                            }
                                        });
                                    });
                                </script>
                            </div>

                            @if (isset($posts) && !(is_null($posts)))
                                <div class="container mt-5">
                                    @if (Auth::check())
                                    <form method="POST" action="{{ route('dictionary') }}" enctype="multipart/form-data">
                                        @csrf
                                        <h6 class="form-txt mb-3">＊「{{ $posts[0]->title }}」について書き込む</h6>
        
                                        {{-- <input type="hidden" name="path" value="{{ $path }}">
                                        <input type="hidden" name="path_length" value="{{ $path_length }}"> --}}
        
                                        
                                        <!-- タイトル -->
                                        <div>
                                            <x-label for="title" value="タイトル" />
        
                                            <x-input id="title" class="block mt-1 w-full" type="text" name="sub_title" :value="old('title')" required placeholder="記事のタイトル" autofocus />
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
                                        <h6 class="form-txt mb-3">＊「{{ $posts[0]->title }}」について書き込むためには、ログインが必要です。</h6>
                                    @endif
                                </div>
                            @endif

                        </div>   
                    </div>
                </div>

            </div>
        </div>

    <!-- footer -->
    <x-footer/>
</x-app-layout>