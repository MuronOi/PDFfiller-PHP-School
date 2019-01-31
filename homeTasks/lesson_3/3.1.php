<?php

   function getUrl()
   {
       global $argv;
       $shortOpt = "u::";
       $longOpt = array("url::");       
        
       $opt = getopt($shortOpt, $longOpt);
       
       $url = isset($opt['u']) || isset($opt['url']) 
           ? reset($opt)//getopt($shortOpt, $longOpt)
           : $argv[1];

       if (filter_var($url, FILTER_VALIDATE_URL) === false) {
           exit ("Incorrect URL".PHP_EOL);
       } else {
           return $url;
       }
   }   

   function parseUrl(string $url) {
       $s = parse_url($url);
       
      // foreach ($s as $key => $value) {
           
      
       $domain = str_ireplace('www.', '', parse_url($url, PHP_URL_HOST));
       $s["domain"] = $domain;
       $host = explode('.', $s['host']);
       $subdomains = array_slice($host, 0, count($host) - 2 );
       $s["subdomains"] = $subdomains;
 
       var_dump($s);
       
       return $s;
   }

   $parsedUrl = array (
       "scheme" => "",
       "host" => "",
       "port" => "",
       "user" => "",
       "pass" => "",
       "path" => "",
       "query" => "",
       "fragment" => "",
       "domain" => "",
       "subdomain" => "",
       "tld" => "",
       "extension" => "",
       "parsedQuery" => array (),        
   );  

   $ur = getUrl();
   $paresedUrl1 = parseUrl($ur);
   echo $ur , " - переданный URL" , PHP_EOL;
   print_r($paresedUrl1) . PHP_EOL;

