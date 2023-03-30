<?php
$searchTerm = $_GET['search']; // получаем поисковый запрос от пользователя
$apiKey = 'AIzaSyBtW2Z1UTOiGQOf6YR0EwhNqXF4_zitmuk'; // ваш API-ключ
$searchEngineId = 'e00dd44c8912341b5'; // ID поисковика, который вы создали

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
    <title>Title</title>
</head>
<body>
<h2>Search by slap.</h2>
<form method="GET" action="/search.php">
    <label for="search"></label>
    <input type="text" id="search" name="search" value="<?php if (isset($_GET['search'])) {echo $_GET['search'];}?>"><br><br>
    <input type="submit" value="Search">
</form>
<?php
// выводим результаты поиска
foreach ($results['items'] as $item) {
    echo "<a href={$item['link']}>";
    echo "<p>{$item['title']}</p>";
    echo "</a>";
}
?>
</body>
</html>