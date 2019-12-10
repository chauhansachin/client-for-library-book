<?php

class Auth_service {

    public function login($email, $password)
    {
        $url = 'http://localhost:8000/api/login';
        $data = array(
            'email' => $email,
            'password' => $password
        );

        return $this->getToken($url, $data);
    }

    public function register($name, $email, $phone, $password)
    {
        $url = 'http://localhost:8000/api/register';
        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
        );

        return $this->getToken($url, $data);
    }

    public function getToken($url, $data)
    {
        $curl = curl_init($url);

        $headr = array();
        // $headr[] = 'Content-type: application/json';
        $headr[] = 'Accept: application/json';
        // $headr[] = 'Authorization: OAuth '.$accesstoken;

        curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, rawurldecode(http_build_query($data)));

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        return $response->access_token;
    }
}
