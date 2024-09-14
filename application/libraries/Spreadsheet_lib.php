<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Spreadsheet_lib {

    public function __construct() {
        // Load PhpSpreadsheet library
        require_once(dirname(APPPATH) . '/vendor/autoload.php');
    }

    public function readExcel($file_path) {
        $spreadsheet = IOFactory::load($file_path);
        return $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    }

    public function exportData($data, $filename, $fields = array(), $aliases = array()) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Add headers dynamically
        $headers = array('No');
        foreach ($fields as $index => $field) {
            $headers[] = isset($aliases[$index]) ? $aliases[$index] : $field;
        }
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }
    
        // Add data
        $row = 2;
        $no = 1;
        foreach ($data->result() as $d) { // Use result() method to retrieve data
            $sheet->setCellValue('A' . $row, $no++);
            $col = 'B';
            foreach ($fields as $field) {
                $sheet->setCellValue($col . $row, isset($d->$field) ? $d->$field : '');
                $col++;
            }
            $row++;
        }
    
        // Save to file
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
    }
    
}
