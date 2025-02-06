<?php 

namespace App\Services;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class WebCrawlerService
{
 
    public $srchreponsedata = [];

    public function __construct()
    {
            $this->searcQry = 'https://www.google.com/search?=';         

    }
    public function crawl($url)
    {
        
        try {

        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getbody()->getContents();
        $geteddata  = json_decode($html, true);
 
      $srchreponsedata = [];    
          foreach($geteddata['items'] as $getitems)
          {
            $srchreponsedata[] = [
                'title'            => $getitems['title'],
                'link'             => $getitems['link'],
                'htmlTitle'        => $getitems['htmlTitle'],
                'displayLink'      => $getitems['displayLink'],
                'snippet'          => $getitems['snippet'],
                'htmlSnippet'      => $getitems['htmlSnippet'],
                'formattedUrl'     => $getitems['formattedUrl'],
                'htmlFormattedUrl' => $getitems['htmlFormattedUrl'],
            ];
        
          }
          return json_encode($srchreponsedata);
        } catch (RequestException $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
            
    }
    public function urlcrawling($crawurl)
    
    {
       $crawurl = $this->crawl($crawurl); 
       
   
       return json_decode($crawurl);
    }

}