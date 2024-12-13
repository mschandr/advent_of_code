<?php

class simularityScore
{
    public string $file = "file.txt";
    private array $difference = [];

    public function __construct()
    {
        try {
            $open_file = new SplFileObject($this->file);
        } catch (LogicException $exception) {
            die('SplFileObject : '.$exception->getMessage());
        }
        $i=0;
        $array1 = array();
        $array2 = array();
        while ($open_file->valid()) {
            $parts = explode(" ", trim($open_file->fgets()));
            if (count($parts)>2) {
                $array1[$i] = $parts[0];
                $array2[$i] = $parts[3];
                $i++;
            }
        }
        echo "sum = $sum".PHP_EOL;;
    }
}

$class = new simularityScore();
