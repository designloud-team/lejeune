<?php

namespace App;

use DB;

class CSVtoSQL {

    private $filePath, $csvData;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function readDataIn() {
        $file = fopen($this->filePath, 'r');
        $data = fread($file, filesize($this->filePath));

        // Split CSV line by line.
        $lines = explode("\n", $data);

        // Split each line by commas to extract each value.
        for ($i = 0; $i < sizeof($lines); $i++) {
            $this->csvData[$i] = explode(',', $lines[$i]);
        }

        fclose($file);

        // Returns true if we managed to read data, false if we didn't.
        return (sizeof($this->csvData) > 0);
    }

    public function getHeadings() {
        if (sizeof($this->csvData) > 0) {
            // The first index of csvData has all the headings.
            return $this->csvData[0];
        }
        else {
            return null;
        }
    }

    public function getTableColumns($tableName)
    {
        DB::connection('mysql')->disableQueryLog();
        return DB::select('show columns from ' . $tableName);
    }

    public function pushToDatabase($con, $tableName, $columns) {
        $createColumnQuery = '';
        $insertQuery = 'INSERT INTO ' . $tableName . ' (';

        // Build column section of query.
        foreach ($columns as $column) {
            $createColumnQuery .= $column['name'] . ' ' . $column['type'] . ',';
        }

        // Remove trailing comma.
        $createColumnQuery = rtrim($createColumnQuery, ',');

        // Create table.
        $con->query('CREATE TABLE ' . $tableName . ' (' . $createColumnQuery . ')');

        // Create insert query template.
        foreach ($columns as $column) {
            $insertQuery .= $column['name'] . ',';
        }

        // Remove trailing comma.
        $insertQuery = rtrim($insertQuery, ',');

        // Insert values using our insertQuery string which looks like: "INSERT INTO <<table name>> (<<column 1>>, <<column 2>>"
        // Also skip the first line as that has the headings.
        for ($i = 1; $i < sizeof($this->csvData); $i++) {
            $values = '';

            foreach($this->csvData[$i] as $value) {
                $values .= '\'' . $value . '\',';
            }
            // Remove trailing comma.
            $values = rtrim($values, ',');
            $con->query($insertQuery . ') VALUES (' . $values . ')');
        }
    }
}