<x-app-layout>
<x-slot name="title">
    トップページ｜laraCake
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
                                <img class="rounded-circle" width="40" height="40" src="storage/person-circle.svg" alt="">
                            </div>
                            <div class="ml-2"> 
                                <div class="h5">{{ Auth::user()->name }}</div>
                                <div class="h7 text-muted">{{ Auth::user()->email }}</div>
                            </div>
                            @else

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

                <div class="col-md-6 gedf-main">
                    <!--- \\\\\\\Post-->
                    @foreach ($posts as $post)
                    <div class="card gedf-card shadow">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-2">
                                        <img class="rounded-circle" width="35" height="35" src="storage/person-circle.svg" alt="">
                                    </div>
                                    <div class="ml-2">
                                        <div class="h5 m-0">{{ $post->user_name }}</div>
                                        <div class="text-muted h7"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a href="/{{ $post->user_name }}/{{ $post->id }}">
                        <div class="card-body">

                            <h5 class="card-text">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text">
                                {{ $post->post }}
                            </p>

                            @if (!$post->postImage->isEmpty())
                            <img src="storage/{{ $post->postImage->first()->image }}">
                            @endif

                            <p class="text-muted h6">#{{ $post->category }}</p>

                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>                       
                <!-- Post /////-->

                <div class="col-md-3 news">
                    <div class="h5">What’s happening</div>    
                    <?php
                    $xmlTree = simplexml_load_file('https://news.yahoo.co.jp/rss/topics/top-picks.xml');
                    foreach($xmlTree->channel->item as $item):
                    ?>    
                    <div class="card gedf-card shadow">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item->title?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item->pubDate?></h6>
                            <p class="card-text">
                                <?php echo $item->description?>
                            </p>
                            <a href="<?php echo $item->link?>" class="card-link"><?php echo $item->link?></a>
                        </div>
                    </div>
                    <?php endforeach?>    
                </div>
            </div>
        </div>
    
    <!-- footer -->
    <x-footer/>
</x-app-layout>



