<?php
    require_once('YoutubeDownloader.php');

    if (isset($_POST['submit'])) {
        $youtube = new YoutubeDownloader();
        $links = $youtube->getDownloadLinks($_POST['url']);
        if (!empty($links)) {
            foreach ($links as $key => $value) {
                if ($key == 'audio') {
                    foreach ($value as $format => $link) {
                        echo "<a href='{$link}' download>Download MP3 ({$format})</a><br>";
                    }
                }
            }
        } else {
            echo "No download links found!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>MP3 Downloader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #FFF;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>MP3 Downloader</h1>
        <form method="post">
            <input type="text" name="url" placeholder="Enter YouTube video URL" required>
            <button type="submit" name="submit">Download MP3</button>
        </form>
    </div>
</body>
</html>