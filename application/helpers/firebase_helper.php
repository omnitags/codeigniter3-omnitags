<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Firebase REST API helper functions

if (!function_exists('firebase_get_data')) {

    /**
     * Get data from Firebase
     * @param string $endpoint The Firebase database endpoint path (e.g., "/users")
     * @return mixed Response data from Firebase
     */
    function firebase_get_data($fb_api, $endpoint = '')
    {
        $firebase_url = $fb_api;
        $url = $firebase_url . '/' . $endpoint . ".json";  // Firebase uses .json for REST

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Error: ' . curl_error($ch);
        }

        curl_close($ch);
        // Decode the response
        $data = json_decode($response, true);

        // Filter out entries with key of '0'
        if (is_array($data)) {
            unset($data['0']);  // Remove the entry where the key is '0'
        }

        // Return the filtered data
        return $data;
    }
}

if (!function_exists('firebase_create_data')) {

    /**
     * Create data in Firebase
     * @param string $endpoint Firebase database endpoint (e.g., "/users")
     * @param array $data Data to store in Firebase
     * @return mixed Firebase response
     */
    function firebase_create_data($fb_api, $endpoint = '', $data = [])
    {
        $firebase_url = $fb_api;
        $url = $firebase_url . '/' . $endpoint . ".json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

if (!function_exists('firebase_update_data')) {

    /**
     * Update data in Firebase
     * @param string $endpoint Firebase database endpoint (e.g., "/users/{id}")
     * @param array $data Data to update in Firebase
     * @return mixed Firebase response
     */
    function firebase_update_data($fb_api, $endpoint = '', $data = [])
    {
        $firebase_url = $fb_api;
        $url = $firebase_url . '/' . $endpoint . ".json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

if (!function_exists('firebase_delete_data')) {

    /**
     * Delete data from Firebase
     * @param string $endpoint Firebase database endpoint (e.g., "/users/{id}")
     * @return mixed Firebase response
     */
    function firebase_delete_data($fb_api, $endpoint = '')
    {
        $firebase_url = $fb_api;
        $url = $firebase_url . '/' . $endpoint . ".json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

if (!function_exists('firebase_upload_file')) {

    /**
     * Upload a file to Firebase Storage
     * @param string $storagePath Path in Firebase Storage (e.g., 'user_images/user123/profile.jpg')
     * @param string $filePath Local path to the file to be uploaded
     * @return string|bool The download URL if successful, or false if not
     */
    function firebase_upload_file($fb_bucket, $storagePath, $filePath)
    {
        $firebase_storage_bucket = $fb_bucket;  // Replace with your Firebase Storage bucket
        $url = "https://firebasestorage.googleapis.com/v0/b/" . $firebase_storage_bucket . "/o?name=" . urlencode($storagePath);

        // Get file content and MIME type
        $fileData = file_get_contents($filePath);
        $mimeType = mime_content_type($filePath);

        // Set headers for the file upload
        $headers = [
            'Content-Type: ' . $mimeType,
            'Content-Length: ' . strlen($fileData)
        ];

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fileData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Execute cURL request
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        // Return the download URL if the upload was successful
        if (isset($result['name'])) {
            return "https://firebasestorage.googleapis.com/v0/b/" . $firebase_storage_bucket . "/o/" . urlencode($storagePath) . "?alt=media";
        }

        return false;
    }
}

if (!function_exists('firebase_get_image_tag')) {
    function firebase_get_image_tag($imageUrl, $alt = 'Uploaded Image', $style = 'max-width: 100px; height: auto;') {
       
        // Return the complete <img> tag with the image URL, alt text, and optional styles
        return <<<HTML
        <img src="{$imageUrl}">
        HTML;
    }
}

