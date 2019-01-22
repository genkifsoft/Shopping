<?php
    require_once __DIR__."/../../../libraries/Export.php";
    require_once __DIR__."/../../../libraries/Function.php";
    require_once __DIR__."/../../../libraries/Classes/PHPExcel.php";
    require_once __DIR__."/../../../libraries/fpdf/fpdf.php";
    
    if (isset($_POST['export-csv'])) {
        $export = new ExportFile('category', 'csv');

        $filed = array('ID', 'NAME', 'IMAGE', 'HOME', 'STATUS', 'CREATED');
        $sql = "SELECT id, `name`, images, home, `status`, created_at FROM category";
        $export->filedHeader($filed);
        $export->sqlExportCSV($sql);
        return $export->close();
    } else if (isset($_POST['export-xlsx'])) {
        $export = new ExportFile();
        $sql = "SELECT `name`, images, home, `status`, created_at FROM category";
        $data = $export->sqlExportExcel($sql);

        $excel = new PHPExcel;
        $numRow = 2;
        // create Sheet
        $excel->createSheet();
        $excel->setActiveSheetIndex(0);
        // set sheet
        $sheet = $excel->getActiveSheet()->setTitle('Category');
        
        // set filed for title sheet
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Image');
        $sheet->setCellValue('C1', 'Home');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Created');

        while ($row = mysqli_fetch_assoc($data)) {
            $sheet->setCellValue('A'.$numRow, $row['name']);
            $sheet->setCellValue('B'.$numRow, $row['images']);
            $sheet->setCellValue('C'.$numRow, $row['home']);
            $sheet->setCellValue('D'.$numRow, $row['status']);
            $sheet->setCellValue('E'.$numRow, $row['created_at']);
            $numRow++;
        }

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="data.xlsx"');
        PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
        return;
    } else {
        
        $export = new ExportFile();
        $pdf=new FPDF();
        $pdf->AddPage();
        $pdf->Ln();
        $pdf->SetFont('times','B',10);
        $pdf->Cell(15,7);
        $pdf->Cell(10,7, "STT");
        $pdf->Cell(25,7,"Name");
        $pdf->Cell(30,7,"Image");
        $pdf->Cell(40,7,"Home");
        $pdf->Cell(30,7,"Status");
        $pdf->Cell(30,7,"Created");
        $pdf->Ln();
        $pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
        $pdf->Ln();

        $sql = "SELECT `name`, images, home, `status`, created_at FROM category";
        $data = $export->sqlExportExcel($sql);
        $stt = 0;
        while($rows = mysqli_fetch_assoc($data))
        {
            $stt++;
            $stt = $stt;
            $name = $rows['name'];
            $images = $rows['images'];
            $home = $rows['home'];
            $status = $rows['status'];
            $created_at = $rows['created_at'];
            $pdf->Cell(15,7);
            $pdf->Cell(10,7,$stt);
            $pdf->Cell(25,7,$name);
            $pdf->Cell(30,7,$images);
            $pdf->Cell(40,7,$home);
            $pdf->Cell(30,7,$status);
            $pdf->Cell(30,7,$created_at);
            $pdf->Ln(); 
        }
        $pdf->Output();
        return;
    }
    

    redirectAdmin('admin');
?>
<!-- 
Export excel
Step 1: Create Sheet -> createSheet()
Step 2: Where Sheet is work
Step 3: Get sheet and set name title for sheet this
Step 4: Create column name -->