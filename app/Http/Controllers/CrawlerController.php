<?php

namespace App\Http\Controllers;

use DOMDocument;

use App\Models\Website;
use App\Observers\CustomCrawlerObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Crawler\Crawler;
use GuzzleHttp\Client;


class CrawlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url = $request->url;
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = (string) $response->getBody();
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->encoding = 'UTF-8';
        @$dom->loadHTML($html);
        $title = $dom->getElementsByTagName('title')[0]->nodeValue;
        $metas = $dom->getElementsByTagName('meta');
        $description = '';
        foreach ($metas as $meta){
            if($meta->getAttribute('name') == 'description') {
                $description = $meta->getAttribute('content');
            }
        }

        $body = $dom->getElementsByTagName('body')[0]->nodeValue;
        
        Website::updateOrCreate([
            'url' => $url,
            'title' => $title,
            'description' => $description,
            'image_path' => '',
            'body' => $body
        ]);

        return redirect('/');
    }

}
