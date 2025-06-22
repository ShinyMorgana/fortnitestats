<?php

namespace Services;

class FortniteApiService
{
    private string $apiKey;

    public function __construct()
    {   
        $this->apiKey = $_ENV['FORTNITE_API_KEY'] ?? '';
    }

    public function fetchStats(string $username): ?array
{
    if (empty($this->apiKey)) {
        return null;
    }

    $url = "https://fortnite-api.com/v2/stats/br/v2?name=" . urlencode($username);
    $headers = [
        "Authorization: {$this->apiKey}"
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false, // we hoeven de headers niet los
    ]);

    $response = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false || $statusCode !== 200) {
        return null;
    }

    $data = json_decode($response, true);

    // Error handling
    if (isset($data['status']) && $data['status'] === 200 && isset($data['data'])) {
        return $data['data'];
    }

    return null;


}
}
