<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\NewsBuilder;


class RssNewsBuilder implements NewsBuilder
{
    public function parse($url)
    {
        $data = simplexml_load_file($url)->channel;
        if ($data === false)
        {
            throw new Exception(
                'read data [' . htmlspecialchars($url, ENT_QUOTES, mb_internal_encoding()) . '] failed !'
            );
        }
        
        $list = array();
        foreach ($data->item as $item) {
            $list[] = new News(
                $item->title,
                $item->link,
                $item->pubDate,
            );
        }
        return $list;
    }
}
