<?php

function getProfileImage($userId) {
    $jsonFile = __DIR__ . '/../data/user_images.json';
    $defaultImage = 'https://ui-avatars.com/api/?name=User&background=random'; 
    if (!file_exists($jsonFile)) {
        return $defaultImage;
    }

    $jsonData = file_get_contents($jsonFile);
    $images = json_decode($jsonData, true);

    if (isset($images[$userId])) {
        // Check if file actually exists in uploads
        $filePath = 'uploads/' . $images[$userId];
        if (file_exists(__DIR__ . '/../public/' . $filePath)) {
            return $filePath;
        }
    }

    return $defaultImage; 
}
?>
