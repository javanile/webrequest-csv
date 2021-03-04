<?php

class Client
{
    protected $path;
    protected $columns;

    public function __construct($path, $columns)
    {
        $this->path = explode('.', trim($path, " \t\n\r\0\x0B."));
        $this->columns = explode(',', trim($columns, " \t\n\r\0\x0B,"));
    }

    /**
     * @param $json
     * @param $path
     * @param $keys
     * @return string[]
     */
    public function parse($json, $path, $keys)
    {
        foreach ($this->path as $step) {
            if (empty($step)) {
                continue;
            } elseif (isset($json[$step])) {
                $json = $json[$step];
            } else {
                return [''];
            }
        }

        $row = 1;
        $flat = -1;
        $table = [];
        foreach ($json as $key => $value) {
            if (is_array($value)) {
                $column = 0;
                $table[$row][$column] = $key;
                $column = 1;
                $table[$row][$column] = is_array($value) ? count($value) : $value;
            } else {
                $flat = $flat === -1 ? $row : $flat;
                $column = 0;
                $table[$flat][$column] = $key;
                $column = 1;
                $table[$flat][$column] = is_array($value) ? count($value) : $value;
            }

            if (empty($columns[0])) {
            }
            #$column = array_search();
            #$table[$row][$column] = $value;

                /*
                    if (is_array($value)) {
                        $table[$row]['#'] =
                foreach (columns as column) {
                        table[row][column] = item[column] ?? ''
                }
                } else {

                }
                merge get_keys item
                */
            $row++;
        }

        return $table;
    }

    /**
     * @param $table
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape_char
     * @return false|string
     */
    function csv($table, $delimiter = ',', $enclosure = '"', $escape_char = "\\")
    {
        $file = fopen('php://memory', 'r+');
        foreach ($table as $row) {
            fputcsv($file, $row, $delimiter, $enclosure, $escape_char);
        }
        rewind($file);
        return stream_get_contents($file);
    }
}
