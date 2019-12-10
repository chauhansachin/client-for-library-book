<?php

class Book_service {

    public function last_5_rented_books($token)
    {
        $url = 'http://localhost:8000/api/books/rent/history?limit=5';

        return $this->makeRequest($url, $token);
    }

    public function no_of_books_for_last_15_days($token)
    {
        $url = 'http://localhost:8000/api/books/no-of-books/rent-for-last/15';

        return $this->makeRequest($url, $token);
    }

    public function list_of_books($page, $token)
    {
        $url = 'http://localhost:8000/api/books?page='.$page;

        return $this->makeRequest($url, $token);
    }

    public function makeRequest($url, $token)
    {
        $curl = curl_init($url);

        $headers = array();
        // $headers[] = 'Content-type: application/json';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Bearer '.$token;

        curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
        // curl_setopt($curl, CURLOPT_GET,true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($curl));

        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        return array(
            'http_code' => $http_code,
            'response' => $response
        );
    }
}
