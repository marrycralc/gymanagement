<?php

namespace App\Http\Controllers\Auth;
use App\Services\WebCrawlerService;
use Illuminate\Http\Request;

class WebcrawController
{
  
 
    public function __construct(WebCrawlerService $webCrawlerService)
    {
        $this->webCrawlerService = $webCrawlerService;
    }

    public function geturlifo(Request $request)
    {

        $googelurl = $this->webCrawlerService->searcQry;
        $url = $googelurl.$request->serachfopresult;
        
       $datareached  =  $this->webCrawlerService->urlcrawling($url);

       return $datareached;

    }
     
}

