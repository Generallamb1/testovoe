<?php
function jsonClose($json)
{
    $json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('phone_book.json', $json);
}
function jsonGetContent($bookName = "phone_book.json"){
    return json_decode(file_get_contents($bookName));
}
