<?php
//composer require guzzlehttp/guzzle
// $response = $client->request('GET', 'https://api.example.com/data/resource', [
//     'headers' => [
//         'Authorization' => 'Bearer YOUR_API_TOKEN',
//         'Accept'        => 'application/json',
//     ]
// ]);

require 'vendor/autoload.php'; // Include the Composer autoloader
$client = new GuzzleHttp\Client();
$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts', );
$body = $response->getBody();
// The body is a stream, convert to string and decode JSON
$data = json_decode($body->getContents(), true);

function truncate_text($text, $length = 100, $ellipsis = '...') {
    // If the text is already shorter than or equal to the length, return it as is
    if (strlen($text) <= $length) {
        return $text;
    }

    // Truncate the string to the desired length
    $truncatedText = substr($text, 0, $length);

    // Find the position of the last space within the truncated portion
    $lastSpace = strrpos($truncatedText, ' ');

    // If a space was found, truncate again to the last space to avoid cutting words
    if ($lastSpace !== false) {
        $truncatedText = substr($truncatedText, 0, $lastSpace);
    }

    // Add the ellipsis and return
    return $truncatedText . $ellipsis;
}

?>

<table class="table fs-6 fst-normal">
    <thead>
        <th>id</th>
        <th>title</th>
        <th>body</th>
    </thead>

    <tbody>
        <?php foreach($data as $post):?>
            <tr>
                <td><?=$post["id"]?></td>
                <td><?=truncate_text($post["title"],30)?></td>
                <td><?=truncate_text($post["body"],80)?></td>
            </tr>
        <?php endforeach;?>
    </tbody>

</table>