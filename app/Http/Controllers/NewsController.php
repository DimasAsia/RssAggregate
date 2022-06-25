<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rss;
use App\Models\News;

class NewsController extends Controller
{
    public function aggregrate($id_rss){
        //1. disini dibuat logic untuk get rss data dengan id_rss
        $rss = Rss::findOrFail($id_rss);
        //dd($rss);
        //2. Parsing xml to object
        $xml = file_get_contents($rss->url);
        $xmlObj = simplexml_load_string($xml);
        // dd($xmlObj->channel);
        //3. simpan ke table news
        foreach($xmlObj->channel->item as $xml){
            $title= $xml->title;
            $img_url= $xml->img_url;
            $desc= $xml->description;
            $url= $xml->enclosure['url'];
            $data= array(
                'title' => $title,
                'img_url' => $img_url,
                'description' => $desc,
                'source_url' => $xml->link,
                'rss_id' => $id_rss
            );
            News::Create($data);
            //dd($data);
        
        // get from news
        $news= News::where('rss_id', $id_rss)->get();
        foreach($news as $n){
            print_r($n->title ."<br>".$n->description);
            print_r("<br>");
        }
            
        }
    }
}
