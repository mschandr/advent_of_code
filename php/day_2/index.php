<?php

class ReactorReportsSafetyChecks
{
    public string $file = "day_2.txt";
    public string $path = "../../inputs/";
    private array $difference = [];

    public function __construct()
    {
        try {
            $open_file = new SplFileObject($this->path.$this->file);
        } catch (LogicException $exception) {
            die('SplFileObject : '.$exception->getMessage());
        }
        $i          = 0;
        $iterations = 0;
        $array1     = array();
        $valid      = 0;
        $invalid    = 0;
        while ($open_file->valid()) {
            $parts      = explode(" ", trim($open_file->fgets()));
            $iterations = count($parts);
            if ($iterations > 1) {
                for ($iterations = 0; $iterations < count($parts); $iterations++) {
                    $array1[$i][$iterations] = $parts[$iterations];
                }
            }
            $i++;
        }
        $result = $this->countValidAndInvalidRows($array1);
        echo print_r($result, true);
    }


    private function countValidAndInvalidRows(array $area): array
    {
        $validRows = 0;
        $invalidRows = 0;

        foreach ($area as $row) {
            if (!is_array($row)) {
                throw new InvalidArgumentException('Each element of the area must be an array.');
            }

            if ($this->isIncrementingArray($row) || $this->isDecrementingArray($row)) {
                $validRows++;
            } else {
                $invalidRows++;
            }
        }

        return [
            'valid' => $validRows,
            'invalid' => $invalidRows,
        ];
    }

    private function isIncrementingArray(array $numbers): bool {
        for ($i = 1; $i < count($numbers); $i++) {
            $diff = $numbers[$i] - $numbers[$i - 1];
            if ($diff !== 1 && $diff !== 2 && $diff !== 3) {
                return false;
            }
        }
        return true;
    }

    private function isDecrementingArray(array $numbers): bool {
        for ($i = 1; $i < count($numbers); $i++) {
            $diff = $numbers[$i - 1] - $numbers[$i];
            if ($diff !== 1 && $diff !== 2 && $diff !== 3) {
                return false;
            }
        }
        return true;
    }
}

$class = new ReactorReportsSafetyChecks();
