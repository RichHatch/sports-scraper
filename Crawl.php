<?php

require __DIR__ . '/vendor/autoload.php';


/*
 * This file is part of the sports-scraper package.
 *
 * (c) Rich Hatch <dick.hatch.bba@gmail.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Goutte\Client;

$client = new Client();

$crawler = $client->request('GET', 'http://www.symfony.com/blog/');

$client->getClient()->setDefaultOption('config/curl/'.CURLOPT_TIMEOUT, 60);

// Click on the "Security Advisories" link
$link = $crawler->selectLink('Security Advisories')->link();
$crawler = $client->click($link);

// Get the latest post in this category and display the titles
$crawler->filter('h2 > a')->each(function ($node) {
    print $node->text()."\n";
});



