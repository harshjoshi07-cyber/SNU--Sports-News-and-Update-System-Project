<?php
// Function to create a colored image with text
function createImage($width, $height, $text, $bgColor, $textColor, $outputPath) {
    // Create image
    $image = imagecreatetruecolor($width, $height);
    
    // Set colors
    $bg = imagecolorallocate($image, $bgColor[0], $bgColor[1], $bgColor[2]);
    $textColor = imagecolorallocate($image, $textColor[0], $textColor[1], $textColor[2]);
    
    // Fill background
    imagefill($image, 0, 0, $bg);
    
    // Add text
    $fontSize = 5;
    $fontWidth = imagefontwidth($fontSize);
    $fontHeight = imagefontheight($fontSize);
    $textWidth = strlen($text) * $fontWidth;
    $x = ($width - $textWidth) / 2;
    $y = ($height - $fontHeight) / 2;
    imagestring($image, $fontSize, $x, $y, $text, $textColor);
    
    // Save image
    imagejpeg($image, $outputPath);
    imagedestroy($image);
    
    echo "Created image: $outputPath\n";
}

// Create directories if they don't exist
if (!file_exists('assets/images/news')) {
    mkdir('assets/images/news', 0777, true);
}
if (!file_exists('assets/images/authors')) {
    mkdir('assets/images/authors', 0777, true);
}

// Generate news images
createImage(800, 400, 'Champions League Final', [0, 100, 200], [255, 255, 255], 'assets/images/news/champions-league.jpg');
createImage(800, 400, 'NBA Playoffs', [200, 0, 0], [255, 255, 255], 'assets/images/news/nba-playoffs.jpg');
createImage(800, 400, 'Tennis Grand Slam', [0, 150, 0], [255, 255, 255], 'assets/images/news/tennis-grand-slam.jpg');

// Generate author images
createImage(200, 200, 'John Doe', [100, 100, 100], [255, 255, 255], 'assets/images/authors/john-doe.jpg');
createImage(200, 200, 'Jane Smith', [150, 100, 50], [255, 255, 255], 'assets/images/authors/jane-smith.jpg');
createImage(200, 200, 'Mike Wilson', [50, 100, 150], [255, 255, 255], 'assets/images/authors/mike-wilson.jpg');

echo "All images generated successfully!\n";
?> 