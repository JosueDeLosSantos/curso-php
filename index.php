<?php


const API_URL = "https://whenisthenextmcufilm.com/api";
# Start new curl session, ch = curl handle
$ch = curl_init(API_URL);
/* 
Presents the result of the request 
but do not show it on screen
*/
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Make request and get response
$response = curl_exec($ch);

# An easier way to do it
# $response = file_get_contents(API_URL);


// Decode response to show an associative array
$data = json_decode($response, true);
// Close the session
curl_close($ch);
?>


<head>
    <meta charset="utf-8">
    <title>Next MCU</title>
    <meta name="description" content="Next MCU">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Centered viewport -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="<?= $data["title"]; ?> poster">
    </section>
    <hgroup>
        <h3><?= $data["title"]; ?> Will be released in <?= $data["days_until"]; ?> days.</h3>
        <p> Release date: <?= $data["release_date"]; ?></p>
        <p> Next movie will be: <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    hgroup {
        text-align: center;
    }
</style>