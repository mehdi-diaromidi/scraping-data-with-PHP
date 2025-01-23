<?php
require 'vendor/autoload.php';

use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
use Symfony\Component\CssSelector\CssSelectorConverter;

//url

// $url = 'https://www.technolife.com/product-31023/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%D9%8A%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%DA%AF%D9%84%DA%A9%D8%B3%DB%8C-a55-5g-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-256-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA-%D8%B1%D9%85-8-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA---%D9%88%DB%8C%D8%AA%D9%86%D8%A7%D9%85';
// $term = '%D8%B4%DB%8C%D8%A7%D8%A6%D9%88%D9%85%DB%8C';
// $url = 'https://www.technolife.com/product/list/search?keywords=' . $term . '/';
// $encodedStr = "%D8%B4%DB%8C%D8%A7%D8%A6%D9%88%D9%85%DB%8C";
// $decodedStr = urldecode($encodedStr);
// $url = 'https://www.technolife.com/product-31023/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%D9%8A%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%DA%AF%D9%84%DA%A9%D8%B3%DB%8C-a55-5g-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-256-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA-%D8%B1%D9%85-8-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA---%D9%88%DB%8C%D8%AA%D9%86%D8%A7%D9%85';
$url = "https://www.technolife.com/product-61669/%DA%AF%D9%88%D8%B4%DB%8C-%D9%85%D9%88%D8%A8%D8%A7%D9%8A%D9%84-%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF-%D9%85%D8%AF%D9%84-galaxy-s24-fe-%D8%B8%D8%B1%D9%81%DB%8C%D8%AA-256-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA-%D8%B1%D9%85-8-%DA%AF%DB%8C%DA%AF%D8%A7%D8%A8%D8%A7%DB%8C%D8%AA---%D9%88%DB%8C%D8%AA%D9%86%D8%A7%D9%85?query_id=40AE8AFCEA8060D6&position=1";


// get the data from url

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', $url);
$html = '' . $response->getBody();

$crawler = new Crawler($html);


echo $crawler->filter('strong')->text();
echo '<br>' . 'قیمت تخفیف خورده';
echo $crawler->filter('div.pb-4:nth-child(3) > div:nth-child(1) > div:nth-child(1) > div:nth-child(2) > p:nth-child(1)')->text();
echo '<br>' . 'قیمت اصلی';
echo $crawler->filter('div.pb-4:nth-child(3) > div:nth-child(1) > div:nth-child(1) > div:nth-child(2) > p:nth-child(2)')->text();

// echo $crawler->filter('p')->text();
echo '<br>';
