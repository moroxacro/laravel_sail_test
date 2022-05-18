<div class="col-md-3 news">
    <div class="h5">What’s happening</div>    
    <?php
    $xmlTree = simplexml_load_file('https://news.yahoo.co.jp/rss/topics/top-picks.xml');
    $item = array();
    $item = $xmlTree->channel->item;
    for ( $i=0; $i<5; $i++ ):
    ?>
    <div class="card gedf-card shadow">
        <div class="card-body">
            <h5 class="card-title"><?php echo $item[$i]->title?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item[$i]->pubDate?></h6>
            <p class="card-text">
                <?php echo $item[$i]->description?>
            </p>
            <a href="<?php echo $item[$i]->link?>" class="card-link"><?php echo $item[$i]->link?></a>
        </div>
    </div>
    <?php endfor?>
</div>