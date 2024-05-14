<?php

class DataSource
{

    private $host =  null;
    private $user = null;
    private $pass = null;
    private $db = null;
    private $creds = null;
    public $writePath = null;

    public function __construct($credentials = null)
    {
        $this->creds =  ($credentials ?? __DIR__ . "\mysql_credentials.json");
    }

    // Use if your data source is JSON files
    public function JSON($array = true)
    {
        $path = $this->creds;
        $json = file_get_contents($path);
        $this->writePath = $path;
        return json_decode($json, $array); // Return PHP Object or Array
    }

}
