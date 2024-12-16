<?php

class calculateDifference
{
    public string $file = "day_1.txt";
    public string $path = "../../inputs/";
    private array $difference = [];

    public function __construct()
    {
        try {
            $open_file = new SplFileObject($this->path.$this->file);
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
        $running_sum = 0;
        $sum = 0;
        if (count($array1) == count($array2)) {
            $sorted_1 = sort($array1);
            $sorted_2 = sort($array2);
            for ($j = 0; $j < count($array1); $j++) {
                if ($array1[$j] >= $array2[$j]) {
                    $running_sum = $array1[$j] - $array2[$j];
                } else {
                    $running_sum = $array2[$j] - $array1[$j];
                }
                $sum+=$running_sum;
            }
        }
        echo $sum;
    }
}

$class = new calculateDifference();
