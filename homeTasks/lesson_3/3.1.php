<?php


   
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
        $parsedUrl = parse_url($url);
        return $parsedUrl;
    }

    function getHost($parsedUrl)
    {
        $parsedUrl['hostStr'] = explode('.', $parsedUrl['host']);
        $parsedUrl['tld'] = array_pop($parsedUrl['hostStr']);
        return $parsedUrl;
    }

    function getSld($parsedUrl)
    {
        $subTld = ["com", "co", "org", "in", "us", "gov", "mil", "int", "edu", "net", "biz", "info",];
        if (in_array(end($parsedUrl['hostStr']), $subTld, 1) === true) {
            $parsedUrl['sld'] = array_pop($parsedUrl['hostStr']) . '.' . $parsedUrl["tld"];
        }
        return $parsedUrl;
    }

    function getDomain($parsedUrl)
    {
        $parsedUrl['domain'] = isset($parsedUrl['sld']) === true
            ? array_pop($parsedUrl['hostStr']) . '.' . $parsedUrl['sld']
            : array_pop($parsedUrl['hostStr']) . '.' . $parsedUrl['tld'];
        return $parsedUrl;
    }

    function getSubDomain($parsedUrl)
    {
        $hostStr = $parsedUrl['hostStr'];
        if (empty(implode('.', $hostStr)) === false) {
            $parsedUrl['subdomain'] = implode('.', $hostStr);
        }
        return $parsedUrl;
    }

    function getExtension($parsedUrl)
    {
        if (isset($parsedUrl['path']) === true && empty(strrchr($parsedUrl['path'], '.')) === false) {
            $ext = strrchr($parsedUrl['path'], '.');
            $parsedUrl['extension'] = substr($ext, 1);
        }
        return @$parsedUrl;
    }

    function parseQuery($parsedUrl)
    {
        if (isset($parsedUrl['query']) === true) {
            parse_str($parsedUrl['query'], $parsedUrl['parsedQuery']);
        }
        return $parsedUrl;
    }

    function parse($url)
    {
        $parsedUrl = parseQuery(getExtension(getSubDomain(getDomain(getHost($url)))));
        unset ($parsedUrl['hostStr']);
        return $parsedUrl;

        //echo
    }

    function printUrl($parsedUrl)
    {
        foreach ($parsedUrl as $k => $v){
            if ($k === 'parsedQuery') {
               echo 'Parsed Query:', PHP_EOL;
                foreach ($parsedUrl['parsedQuery'] as $k => $v){
                    echo '       ', $k, ' : ', $v, PHP_EOL;
                }
                exit;
            }
            echo $k, ' : ', $v, PHP_EOL;
        }
    }

    printUrl(parse(parseUrl(getUrl())));


