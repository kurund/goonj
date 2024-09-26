<?php
function convertHtmlToImage($htmlContent, $outputImage) {
    // Encode HTML content for command line
    $htmlContent = escapeshellarg($htmlContent);

    // Command to run the Node.js script with the HTML content and output image
    $command = "node puppeteer.js $htmlContent $outputImage";

    // Execute the command
    exec($command, $output, $returnCode);

    // Check if the conversion was successful
    if ($returnCode === 0) {
        echo "Image successfully created at: $outputImage";
    } else {
        echo "Failed to convert HTML to image. Return code: $returnCode";
    }
}

// Sample HTML content
$htmlFile = 'jgw2022.html';
$htmlContent = file_get_contents($htmlFile);

// Output image file (PNG format)
$outputImage = 'jgw2022.png';

// Convert HTML to image
convertHtmlToImage($htmlContent, $outputImage);
?>
