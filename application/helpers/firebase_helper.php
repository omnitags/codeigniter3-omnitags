<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Firebase REST API helper function
if (!function_exists('firebase_get_data')) {
    
    /**
     * Get data from Firebase
     * @param string $endpoint The Firebase database endpoint path (e.g., "/users")
     * @return mixed Response data from Firebase
     */
    function firebase_get_data($endpoint = '') {
        // Firebase project base URL
        $firebase_url = "https://hotelapp-a036a-default-rtdb.firebaseio.com/";
        
        // Build the URL with the endpoint
        $url = $firebase_url . $endpoint . ".json";  // Firebase uses .json for REST

        // Initialize cURL session
        $ch = curl_init();
        
        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        // Execute cURL request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            return 'Error: ' . curl_error($ch);
        }
        
        // Close cURL session
        curl_close($ch);
        
        // Return the decoded response as an associative array
        return json_decode($response, true);
    }
}

if (!function_exists('firebase_create_data')) {

    // CREATE: Add data to Firebase
    function firebase_create_data($endpoint = '', $data = []) {
        $firebase_url = "https://hotelapp-a036a-default-rtdb.firebaseio.com/";
        $url = $firebase_url . $endpoint . ".json";

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

    // UPDATE: Update data in Firebase
    function firebase_update_data($endpoint = '', $data = []) {
        $firebase_url = "https://hotelapp-a036a-default-rtdb.firebaseio.com/";
        $url = $firebase_url . $endpoint . ".json";

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

    // DELETE: Delete data from Firebase
    function firebase_delete_data($endpoint = '') {
        $firebase_url = "https://hotelapp-a036a-default-rtdb.firebaseio.com/m";
        $url = $firebase_url . $endpoint . ".json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}