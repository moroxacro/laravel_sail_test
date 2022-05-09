@extends('layouts.app')

@section('title', 'トップページ｜laraCake')

@section('content')
<?php 
//投稿を取得する
//$posts = $db->query('select m.name, m.picture, m.email, p.* from members m, posts p where m.id=p.member_id order by p.created desc');
?>
<div class="container gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body ">

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="/register" class="nav__link nav-link-faded has-icon active">会員登録（Laravel/ui）</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin" class="nav__link nav-link-faded has-icon active">会員登録（諸戸自作）</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/login" class="nav__link nav-link-faded has-icon">ログイン</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-6 gedf-main">

        <!--- \\\\\\\Post-->
        <?php //foreach($posts as $post):?>

        <div class="card gedf-card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-2">
                            <img class="rounded-circle" width="45" height="45" src="member_picture/<?php //echo $post['picture'] ?>" alt="<?php //echo htmlspecialchars($post['name'], ENT_QUOTES); ?>">
                        </div>
                        <div class="ml-2">
                            <div class="h5 m-0"><?php //echo htmlspecialchars($post['name'], ENT_QUOTES); ?></div>
                            <div class="text-muted h7"><i class="fa fa-clock-o"></i><?php //echo htmlspecialchars($post['created'], ENT_QUOTES); ?></div>
                        </div>
                    </div>
                </div>

            </div>
            <a href="view.php?id=<?php //echo htmlspecialchars($post['id'], ENT_QUOTES); ?>">
            <div class="card-body">

                <p class="card-text">
                    <?php //echo htmlspecialchars($post['message'], ENT_QUOTES); ?>
                </p>

                <?php //if(isset($post['image']) && $post['image'] != ''): ?> 
                <img src="member_picture/<?php //echo htmlspecialchars($post['image'], ENT_QUOTES); ?>">
                <?php //endif?>

            </div>
            </a>
        </div>

        <?php //endforeach;?>
        <!-- Post /////-->

        </div>
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
@endsection

