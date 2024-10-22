<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number to Words</title>
    <link rel="stylesheet" href="../assets/convert_num.css"">
</head>
<body>
<div class="container">
    <h1>Number to Words Converter</h1>
    <form method="post">
        <label for="number">Enter a number (0-999):</label>
        <input type="number" id="number" name="number" min="0" max="999" required>
        <button type="submit">Convert</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function numberToWords($num) {
            $ones = [
                0 => 'ноль', 1 => 'один', 2 => 'два', 3 => 'три', 4 => 'четыре',
                5 => 'пять', 6 => 'шесть', 7 => 'семь', 8 => 'восемь', 9 => 'девять',
                10 => 'десять', 11 => 'одиннадцать', 12 => 'двенадцать', 13 => 'тринадцать',
                14 => 'четырнадцать', 15 => 'пятнадцать', 16 => 'шестнадцать', 17 => 'семнадцать',
                18 => 'восемнадцать', 19 => 'девятнадцать'
            ];

            $tens = [
                2 => 'двадцать', 3 => 'тридцать', 4 => 'сорок', 5 => 'пятьдесят',
                6 => 'шестьдесят', 7 => 'семьдесят', 8 => 'восемьдесят', 9 => 'девяносто'
            ];

            $hundreds = [
                1 => 'сто', 2 => 'двести', 3 => 'триста', 4 => 'четыреста',
                5 => 'пятьсот', 6 => 'шестьсот', 7 => 'семьсот', 8 => 'восемьсот',
                9 => 'девятьсот'
            ];

            if ($num == 0) {
                return 'ноль';
            } elseif ($num < 20) {
                return $ones[$num];
            } elseif ($num < 100) {
                return $tens[intval($num / 10)] . ($num % 10 != 0 ? ' ' . $ones[$num % 10] : '');
            } else {
                return $hundreds[intval($num / 100)] . ($num % 100 != 0 ? ' ' . numberToWords($num % 100) : '');
            }
        }

        $number = intval($_POST['number']);
        if ($number >= 0 && $number <= 999) {
            $words = numberToWords($number);
            echo "<p>Number in words: <strong>$words</strong></p>";
        } else {
            echo "<p>Please enter a number between 0 and 999.</p>";
        }
    }
    ?>
</div>
</body>
</html>
