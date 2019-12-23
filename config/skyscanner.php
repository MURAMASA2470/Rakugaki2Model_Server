<?php

return [
    /*
    *     skyscanner  APIを叩くための設定
    */

    'urlGet' => 'https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/uk2/v1.0/',
    'urlPost' => 'https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/v1.0',

    'headerPost' => array("X-RapidAPI-Host:skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
        "X-RapidAPI-Key:62afe4a3e3mshf69bf0cd778071ep1b7522jsn2781933ce3ce",
        "Content-Type:application/x-www-form-urlencoded"),
    'headerGet' => array(
        "X-RapidAPI-Host" => "skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
        "X-RapidAPI-Key" => "62afe4a3e3mshf69bf0cd778071ep1b7522jsn2781933ce3ce"
    )
]

?>