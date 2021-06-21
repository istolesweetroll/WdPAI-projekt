<?php

function messages()
{
    if (!isset($_COOKIE['username'])) {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
    if (isset($messages)) {
        foreach ($messages as $message) {
            echo $message;
        }
    }
}
