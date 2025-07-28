<?php


trait FileHandler
{

    private $fileName = __DIR__ . "/../../data/vehicles.json";


    public function readFile()
    {
        if (!file_exists($this->fileName)) {
            file_put_contents($this->fileName, json_encode([]));
        }
        return json_decode(file_get_contents($this->fileName), true);
    }
    public function writeFile($data)
    {
        file_put_contents($this->fileName, json_encode($data, JSON_PRETTY_PRINT));
    }
}
