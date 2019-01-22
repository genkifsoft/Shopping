<?php

require_once __DIR__."/../libraries/Database.php";


class ExportFile extends Database {
    private $output;
    
    public function __construct($name = null, $format = null) {
        parent::__construct();
        if (!is_null($name) && !is_null($format)) {
            $this->contentType($name, $format);
        }
        $this->output = fopen('php://output','w');
    }

    public function contentType($name, $format) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='. $name .'.'. $format);
    }

    public function filedHeader($arrayField) {
        fputcsv($this->output, $arrayField);
    }

    public function sqlExportCSV($sql) {
        $result = $this->queryExport($sql);
        while($row = mysqli_fetch_assoc($result)) {
            fputcsv($this->output, $row);
        }
    }

    public function sqlExportExcel($sql) {
        return $result = $this->queryExport($sql);
    }

    public function close() {
        fclose($this->output);
    }
}

?>