<?php

require_once 'lib.php';

class Contacts
{
    public $json;

    function deleteContact($id)
    {
        $this->json = jsonGetContent();
        foreach ($this->json as $key => $item) {
            if($item->id === $id){
                array_splice($this->json,$key, 1);
                break;
            }
        }
        jsonClose($this->json);
        header('Location: index.php');
    }

    function createContact()
    {
        $this->json = jsonGetContent();

        $newItem = [
            'id' => uniqid(),
            'name' => $_POST['name'],
            'phone' => $_POST['phone']
        ];

        $this->json[] = $newItem;

        jsonClose($this->json);
        header('Location: index.php');
    }

}