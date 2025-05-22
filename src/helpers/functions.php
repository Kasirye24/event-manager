<?php

declare(strict_types=1);

function fileUpload(array $imageName, $folderPath): string|bool
{
    $file_name = '';
    if (!empty($imageName)) {
        $folder = BASE_DIR . '/media/' . $folderPath . '/';
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $file_array =  explode(".", $imageName['name']);
        $file_extension = end($file_array);


        $source = $imageName['tmp_name'];
        $fileName = $imageName['name'];

        $file_name = 'SA' . time() . '.' . $file_extension;

        $destination = $folder . $file_name;
        if (!move_uploaded_file($source, $destination)) {
            return false;
        }
    }
    return $file_name;
}

function convertToMySQLDateFormat(?string $dateString): ?string
{
    if (empty($dateString)) {
        return null; // Or return an empty string, depending on your column's NULLability
    }
    // Create a DateTime object from the input format
    $dateTime = DateTime::createFromFormat('m/d/Y', $dateString);

    // Check if the conversion was successful
    if ($dateTime === false) {
        // Handle invalid date format (e.g., log error, throw exception)
        error_log("Invalid date format received: " . $dateString);
        return null; // Or handle as an error
    }

    // Format it to MySQL's YYYY-MM-DD format
    return $dateTime->format('Y-m-d');
}


function limitCharacters($text, $limit)
{
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit) . '...'; // Add '...' to indicate that the text has been truncated
    }
    return $text;
}

function generateTicketNumber()
{
    $timestamp = time(); // Current timestamp
    $randomStr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 6); // Random 6-character string
    $checkDigit = rand(0, 9); // Single check digit
    return "TKT-{$timestamp}-{$randomStr}-{$checkDigit}";
}
