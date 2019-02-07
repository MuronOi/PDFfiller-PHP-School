<?php

    $parsedUrl = [
       "scheme" => "",
       "host" => "",
       "port" => "",
       "user" => "",
       "pass" => "",
       "path" => "",
       "query" => "",
       "fragment" => "",
       "domain" => "",
       "second level domain" => "",
       "subdomain" => "",
       "tld" => "",
       "extension" => "",
       "parsedQuery" => [],        
    ];
   
    function getUrl()
    {
        global $argv;
        $shortOpt = "u::";
        $longOpt = ["url::"];       
        
        $opt = getopt($shortOpt, $longOpt);
       
        $url = isset($opt['u']) || isset($opt['url']) 
            ? reset($opt) //getopt($shortOpt, $longOpt)
            : $argv[1];

        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            exit ("Incorrect URL".PHP_EOL);
        } else {
            return $url;
        }
    }

    function parseUrl(string $url)
    {
        $subTld = ["com", "co", "org", "in", "us", "gov", "mil", "int", "edu", "net", "biz", "info",];
      
        $s = parse_url($url);
        
        $hostStr = explode('.', $s['host']);
        $s["tld"] = array_pop($hostStr);
        print_r($hostStr);
        //echo $tld, ' TLD'. PHP_EOL;

        if (in_array(end($hostStr), $subTld, 1) === true) {
            $s['sld'] = array_pop($hostStr).'.'.$s["tld"];
        }

        $s['domain'] = isset($s['sld']) === true
            ? array_pop($hostStr).'.'.$s['sld']
            : array_pop($hostStr).'.'.$s['tld'];

        if (empty(implode('.', $hostStr)) === false) {
            $s['subdomain'] = implode('.', $hostStr);
        }

        if (isset($s['path']) === true && empty(strrchr($s['path'], '.') ) === false) {
            $ext = strrchr($s['path'], '.');
            $s['extension'] = substr($ext, 1);
        }

        //

        if (isset($s['query']) === true) {
            parse_str($s['query'], $s['parsedQuery']);
        }

         // echo (parse_str('projectId=236656706&expId=4421&expBranch=1'));
      /*  foreach ($subTld as $key => $value) {
            $sld = $subTld[$key] === $hostStr[2]
        }
     //     $parsedUrl  
      //  }
      // $domain = str_ireplace('www.', '', parse_url($url, PHP_URL_HOST));
      // $s["domain"] = $domain;
       //$host = explode('.', $s['host']);
   //    $subdomains = array_slice($host, 0, count($host) - 2 );
    //   $s["subdomains"] = $subdomains;
 
       var_dump($s);
       //var_dump(PHP_URL_PORT, 123, PHP_URL_PASS);
       
//        $host =*/
        return $s;
   }

   

   $ur = getUrl();
   $paresedUrl1 = parseUrl($ur);
   echo $ur , " - received URL" , PHP_EOL;
   print_r($paresedUrl1) . PHP_EOL;

