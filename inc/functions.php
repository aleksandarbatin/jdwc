<?php
/*
 * @version:1.0.7 20151013
 */

function cssUrl($psUrl = false)
{
    global $Gs_SITE;
    $laBaseQuery = array('wbVersion' => md5(VERSION));
    if ($psUrl === false) {
        $psUrl = BASEURL . WEB_STYLE_PATH . $Gs_SITE . (ENV == 'PRODUCTION' ? '.css' : '.less');
    }

    $laUrlParts = parse_url($psUrl);

    $lsPath = $laUrlParts['path'];

    /* if it's an absolute url, and not ours don't change anything) */
    if (isset($laUrlParts['scheme']) && isset($laUrlParts['host']) && strstr(BASEURL, $laUrlParts['host']) === false) {
        return $psUrl;
    }

    /* If there are params to url */
    if (isset($laUrlParts['query'])) {
        $laUrlQueries = array();
        parse_str($laUrlParts['query'], $laUrlQueries);
        $laBaseQuery = array_merge($laUrlQueries, $laBaseQuery);
    }

    if (ENV == 'PRODUCTION') {
        $lsPath = str_replace('.less', '.css', $laUrlParts['path']);
    }
    $lsNewUrl = CACHEURL . $lsPath;

    return $lsNewUrl;
}

function jsUrl($psUrl = false)
{
    global $Gs_SITE;
    $laBaseQuery = array('wbVersion' => md5(VERSION));

    if ($psUrl === false) {
        $psUrl = BASEURL . WEB_JS_PATH . $Gs_SITE . '.js';
    }

    $laUrlParts = parse_url($psUrl);

    $lsPath = $laUrlParts['path'];

    /* if it's an absolute url, and not ours don't change anything) */
    if (isset($laUrlParts['scheme']) && isset($laUrlParts['host']) && strstr(BASEURL, $laUrlParts['host']) === false) {
        return $psUrl;
    }

    /* If there are params to url */
    if (isset($laUrlParts['query'])) {
        $laUrlQueries = array();
        parse_str($laUrlParts['query'], $laUrlQueries);
        $laBaseQuery = array_merge($laUrlQueries, $laBaseQuery);
    }

    $lsNewUrl = CACHEURL . $lsPath;

    return $lsNewUrl;
}

function imgUrl($psUrl = false)
{
    global $Gs_SITE;
    $laBaseQuery = array('wbVersion' => md5(VERSION));

    $laUrlParts = parse_url($psUrl);

    $lsPath = $laUrlParts['path'];

    /* if it's an absolute url, and not ours don't change anything) */
    if (isset($laUrlParts['scheme']) && isset($laUrlParts['host']) && strstr(BASEURL, $laUrlParts['host']) === false) {
        return $psUrl;
    }

    if ($laUrlParts['path'][0] == '/') {
        $imgFilePath = WEB_ROOT_PATH . $laUrlParts['path'][0];
        if (file_exists($imgFilePath)) {
            $laBaseQuery['mtime'] = filemtime($imgFilePath);
        }
    }
    /* If there are params to url */
    if (isset($laUrlParts['query'])) {
        $laUrlQueries = array();
        parse_str($laUrlParts['query'], $laUrlQueries);

        $laBaseQuery = array_merge($laUrlQueries, $laBaseQuery);
    }


    $lsNewUrl = CACHEURL . $lsPath;

    return $lsNewUrl;
}


function getRealUserIp()
{
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default: return $_SERVER['REMOTE_ADDR'];
    }
}

function dieWithAnError($psUrl, $psCode, $psMessage)
{
    addErrorMessage($psCode, $psMessage);
    header('Location: ' . $psUrl);
    die(0);
}

function dieWithANotice($psUrl, $psCode, $psMessage)
{
    addNoticeMessage($psCode, $psMessage);
    header('Location: ' . $psUrl);
    die(1);
}

function language()
{
    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);

    $lang = $elements[0];

    if (isset($elements[1]) && !empty($elements[1]) && $elements[1] == 'thanks') {
        $tnx = true;
    }

    switch ($lang) {
        case 'fr':
            $lang = "fr";
            break;
        case 'de':
            $lang = "de";
            break;
        case 'it':
            $lang = "it";
            break;
        case 'es':
            $lang = "es";
            break;
        case 'en':
            $lang = "en";
            break;
        default:
            $lang = "fr";
    }

    return $lang;
}

function urlErrors()
{
    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);

    $lang = $elements[0];
    $owned_urls = array('fr', 'it', 'de', 'es', 'en');


    //check if language part of urls has error
    if (in_array($lang, $owned_urls)) {
        $data['langError'] = false;
    } else {
        $data['langError'] = true;
    }

    //check if url has 2nd param and if it is == thanks else error
    if (isset($elements[1]) && !empty($elements[1])) {
        $data['tnx'] = $elements[1] == 'thanks' ? 'tnx' : 'tnxError';
    } else {
        $data['tnx'] = 'notTnx';
    }

    return $data;
}
