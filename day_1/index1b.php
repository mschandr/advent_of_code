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
        $sum = 0;
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
        sort($array1);
        sort($array2);
        $array4 = array_count_values($array2);
        for($j=0; $j<count($array1); $j++) {
            if (array_key_exists($array1[$j], $array4)) {
                $sum += $array1[$j] * $array4[$array1[$j]];
            }
        }
        echo "sum = $sum".PHP_EOL;
    }
}

$class = new simularityScore();
