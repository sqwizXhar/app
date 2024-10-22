<?php
$imagesDir = '../images';

$files = scandir($imagesDir);

$images = array_filter($files, function($file) use ($imagesDir) {
    return in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
});

if ($images) {
    $randomImage = $imagesDir . '/' . $images[array_rand($images)];

    echo '<img src="' . $randomImage . '" alt="Random Image">';
} else {
    echo 'No images found in the folder.';
}
?>