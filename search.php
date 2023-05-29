<?php
$searchTerm = $_GET['search']; // получаем поисковый запрос от пользователя
$apiKey = 'AIzaSyBtW2Z1UTOiGQOf6YR0EwhNqXF4_zitmuk'; // API-ключ
$searchEngineId = 'e00dd44c8912341b5'; // ID поисковика

// формируем URL для запроса к API
$url = 'https://www.googleapis.com/customsearch/v1?' .
    'key=' . $apiKey .
    '&cx=' . $searchEngineId .
    '&q=' . urlencode($searchTerm);

// отправляем запрос к API и получаем ответ в формате JSON
$response = file_get_contents($url);

// декодируем JSON-ответ в массив PHP
$results = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>Search</title>
</head>
<body>
<header class="header">
    <div class="container">
        <form class="form" method="GET" action="./search.php">
            <input class="form__input" type="input" id="search" name="search" value="<?php if (isset($_GET['search'])) {echo $_GET['search'];}?>"><br><br>
            <button class="form__btn" type="submit"><img src="./img/search.svg" alt=""></button>
        </form>
    </div>
</header>
<div class="container result">
    <?php
    // выводим результаты поиска
    foreach ($results['items'] as $item) {
        echo "<a class='result__link' href={$item['link']}>";
        echo "<p class='result__title'>{$item['title']}</p>";
        echo "<p class='result__displaylink'>{$item['displayLink']}</p>";
        echo "<p class='result__snippet'>{$item['snippet']}</p>";
        echo "</a>";
    }
    ?>
</div>
</body>
</html>