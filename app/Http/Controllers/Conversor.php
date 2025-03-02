<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Conversor extends Controller
{    
    private $apiUrl = "https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/eur.json";
    /**
     * Convert currency from one to another using exchange rates
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function convertToEuro($currencyCode, $amount) {
        try {
            $json = file_get_contents($this->apiUrl);
            $data = json_decode($json, true);

            // Access the nested exchange rate data
            $exchangeRate = $data['eur'][strtolower($currencyCode)];
            $result = floatval($amount) / $exchangeRate;
            
            return number_format($result, 2, '.', '');
        } catch (\Exception $e) {
            return $amount; // Return original amount if conversion fails
        }
    }

}
