<x-app-layout>
    <x-slot name="title">
        投稿を管理する｜laraCake
    </x-slot>
        <!-- header -->
        <x-header/>
    
            <div class="container gedf-wrapper">
                <div class="row">
    
                    <!-- Post -->
                    <div class="col-md-9">
                        <div class="posts-container gedf-main">
    
                            @if ($posts->first() !== NULL) 
                                <p>{{ Auth::user()->name }}さんの投稿記事</p>
                            @else
                                <div class="mt-10">
                                    <br><br><br>
                                    <p>まだ投稿記事が一件もありません</p>
                                </div>    
                            @endif
    
                            @foreach ($posts as $post)
                            <div class="card gedf-card shadow">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-between align-items-center">
                                                @if ($post->user->profile_image)
                                                    <p class="profile-img-sm">
                                                        <img class="rounded-circle" src="/storage/{{ $post->user->profile_image }}" alt="{{ $post->user->profile_image }}">
                                                    </p>
                                                @else
                                                    <p class="profile-img-sm">
                                                        <img class="rounded-circle" src="/storage/person-circle.svg" alt="">
                                                    </p>
                                                @endif 
                                            <div class="ml-2">
                                                <div class="h5 m-0">{{ $post->user_name }}</div>
                                                <div class="text-muted h7"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="post card-body">
        
                                    <h4 class="card-text">
                                        {{ $post->title }}
                                    </h4>
                                       {!! $post->post !!}
    
                                    @foreach ($post->tags as $tag)
                                        <a href="/tags/{{ $tag->name }}" class="tag">#{{ $tag->name }}</a>
                                    @endforeach
                                    <form method="POST" action="{{ route('post.update') }}">
                                        @csrf 
                                        <div class="mt-4 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-secondary">編集</button>
                                            <a class="btn btn-danger ml-3 delete">削除</a>
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        </div>
                                    </form>

                                </div>
                            </div>
                            @endforeach
                            
                            <!-- Pagination -->
                            <div class="pagination-container">
                            {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- Post -->
    
                    <!-- News -->
                    <x-sidebar-news/>
    
                </div>
            </div>

            <!-- モーダル本体 -->
            <div class="modal-container">
                <div class="modal-body">
                    <!-- 閉じるボタン -->
                    <div class="modal-close">×</div>
                    <!-- モーダル内のコンテンツ -->
                    <div class="modal-content">
                        <form method="POST" action="{{ route('post.delete') }}">
                            @csrf
                            <div class="container-inside">
                                <div class='deactivate__text'>
                                    <div class='deactivate__text__heading'>必ずご確認ください</div>
                                        <ul>
                                            <li class='u-mb10'>
                                                <p class='u-inline'>
                                                    本当に削除しますか？
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                              </div>

                              <input type="hidden" name="post_id" value="">
                
                              <div class="mt-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger">はい、削除します</button>
                                <a href="{{ route('post.edit') }}" class="btn btn-link">キャンセル</a>
                              </div>
                        </form> 
                    </div>
                </div>
            </div>

            <script>
                $(function(){
                    // 変数に要素を入れる
                    var open = $('.delete'),
                        close = $('.modal-close'),
                        container = $('.modal-container');

                    //開くボタンをクリックしたらモーダルを表示する
                    open.on('click',function(){	
                        container.addClass('active');
                        var target = $(this).next().val();
                        $('input[name="post_id"]').val(target);
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
            
        <!-- footer -->
        <x-footer/>
    </x-app-layout>
    
    
    
    