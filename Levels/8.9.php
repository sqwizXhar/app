<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/arrray.css"> <!-- Подключение CSS файла -->
    <title>Задание 8.9</title>
</head>
<body>
<?php
echo "<h2>Задание 8.9 №2</h2>";
$arr = [
    [
        'header' => 'head1',
        'text' => '111 111 111',
        'href' => '/page/111/',
    ],
    [
        'header' => 'head2',
        'text' => '222 222 222',
        'href' => '/page/222/',
    ],
    [
        'header' => 'head3',
        'text' => '333 333 333',
        'href' => '/page/333/',
    ],
];

$affairs = [
    '2019-12-31' => ['массив дел'],
    '2018-11-29' => ['массив дел'],
    '2018-11-30' => ['массив дел'],
    '2018-12-27' => ['массив дел'],
    '2019-12-29' => ['массив дел'],
    '2019-12-30' => ['массив дел'],
    '2018-12-30' => ['массив дел'],
    '2018-12-31' => ['массив дел'],
];

echo '<div class="task-container">';
foreach ($arr as $item) {
    echo '<div class="task">';
    echo '<h2>' . $item['header'] . '</h2>';
    echo '<p>' . $item['text'] . '</p>';
    echo '<a href="' . $item['href'] . '">' . $item['text'] . '</a>';
    echo '</div>';
}
echo '</div>';

echo '<br>';
echo "<h2>Задание 8.9 №1</h2>";

echo '<div class="affairs-container">';
foreach ($affairs as $date => $items) {
    if (strpos($date, '2018') !== false) {
        echo '<div class="affair">';
        echo "<p>Дела за $date:</p>";
        foreach ($items as $item) {
            echo "<p>$item</p>";
        }
        echo '</div>';
    }
}
echo '</div>';
?>
</body>
</html>