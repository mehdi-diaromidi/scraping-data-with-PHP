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
$url = 'https://www.technolife.com/product/list/search?keywords=%D8%B3%D8%A7%D9%85%D8%B3%D9%88%D9%86%DA%AF';

// get the data from url

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', $url);
$html = '' . $response->getBody();

$crawler = new Crawler($html);

// loop from data
$items = $crawler->filter('article.flex > section.relative')->each(function (Crawler $node, $i) {
    // search the values that we need
    // echo $node->html();
    // echo $node->filter('img')->attr('src');
    // echo '<br>';
    // $title = $node->filter('section.relative:nth-child(1) > div:nth-child(3) > a:nth-child(1) > h2:nth-child(1)');
    $image = $node->filter('img')->attr('src');
    $item = [
        // 'title' => $title,
        'image' => $image
    ];
    return $item;
});
echo '<prev>';
var_dump($items);
echo '</prev>';

// dump the data
foreach ($items as $item) {
    echo '<img src="https://www.technolife.com/' . $item['image'] . '">';
}



// echo data to the screen
// echo $response->getStatusCode(); // 200
// echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
// echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'