<?php 
  /**
   * Study of Guzzle options.
   *
   * @category Components
   * @package  Vinnyfs89Guzzle
   * @author   "Vinicius Feitosa <viniciusfesil@gmail.com>"
   * @license  https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
   * @link     https://viniciusfesil.com.br
   * @since    1.0.0
   * @version  7
   */

require __DIR__ . '/vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
echo $res->getStatusCode();

// 200
echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
echo $res->getBody();
// '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.
$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
$promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});
$promise->wait();