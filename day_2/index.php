<?php

class ReactorReportsSafetyChecks
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
        $i          = 0;
        $iterations = 0;
        $array1 = array();
        $array2 = array();
        while ($open_file->valid()) {
            $parts      = explode(" ", trim($open_file->fgets()));
            $iterations = count($parts);
            if ($iterations > 1) {
                for ($iterations = 0; $iterations < count($parts); $iterations++) {
                    $upper_bound = count($parts)-1;
                    if (($parts[$iterations+1]-$parts[$iterations])==1) {

                    }
                    $array1[$i][$iterations] = $parts[$iterations];
                }
            }
            $i++;
        }

        echo print_r($array1,true);
        die();
        $running_sum = 0;
        $sum = 0;
        if (count($array1) == count($array2)) {
            echo $array2[0].PHP_EOL;
            sort($array1);
            sort($array2);

            $array4 = array_count_values($array2);

            for($j = 0; $j < count($array1); $j++) {
                if (array_key_exists($array1[$j], $array4)) {
                    echo "array1 = ".$array1[$j].PHP_EOL;
                    echo "array4 = ".$array4[$array1[$j]].PHP_EOL;
                    $running_sum += $array1[$j] * $array4[$array1[$j]];
                }
            }
            echo "running sum $running_sum".PHP_EOL;
        }
        echo "sum = $sum".PHP_EOL;;
    }
}

$class = new ReactorReportsSafetyChecks();
