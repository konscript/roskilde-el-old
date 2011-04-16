<?php

class ExcelComponent extends Object {

    function createExcel($data) {   
     
        //App::import('Vendor', 'PHPExcel/PHPExcel');
        //App::import('Vendor', 'PHPExcel/PHPExcel/IOFactory');
        /** Error reporting */
        //error_reporting(E_ALL);

        /** PHPExcel */
        require_once '../vendors/PHPExcel/PHPExcel.php';
        /** PHPExcel_IOFactory */
        require_once '../vendors/PHPExcel/PHPExcel/IOFactory.php';

        // Create new PHPExcel object
        //$objPHPExcel = new PHPExcel();

        //Load existing
        $objReader = PHPExcel_IOFactory::createReader("Excel5");
        $objPHPExcel = $objReader->load("../webroot/files/excelTemplate.xls");

        // Set properties
        $objPHPExcel->getProperties()->setCreator("Roskilde El WebService")
                                     ->setLastModifiedBy("Roskilde El WebService")
                                     ->setTitle("Roskilde el bestilling")
                                     ->setSubject("Roskilde el bestilling for projekt")
                                     ->setDescription("Dette dokument blev oprettet af Søren og Lasse. I er cocks. Vi rocks!")
                                     ->setKeywords("roskilde, 2011, musik, el, bestilling, booking, beer")
                                     ->setCategory("roskilde");

        /*
         * b2: sektionnavn
         * e2: gruppenavn
         * g2: ansvarlig person
         * j2: kontonummer ?
         * c4: Kontaktperson
         * c9: Projektnavn
         * h9: start dato
         * j9: slut dato
         * a10: byggestrøm periode
         * a12: billedekommentar
         *
         * a28-axx: enhedsnavn
         * h28-axx: watt forbrug
         * i28-axx: antal enheder
         * j28-axx: watt forbrug i alt
         *
         *
         * Når alle enheder er udskrevet skal der stå
         * axx: "Forbrug i alt"
         * jxx: alle enheders samlede forbrug (inklusiv hvis der er flere af en enhed)
         *
         *
         * //nyt faneblad
         * på index(2) indsættes billedet et vilkårligt sted
         *
        */

        $objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('B2', 'Underholdning') //sektion
		            ->setCellValue('E2', $data["Group"]["title"]) //gruppenavn
                    ->setCellValue('J2', "5, 1509") //kontonummer
		            ->setCellValue('C9', $data["Project"]["title"]) //Projektnavn
		            ->setCellValue('H9', $data["Project"]["items_start"]) //start dato
		            ->setCellValue('J9', $data["Project"]["items_end"]) //slut dato
                    ->setCellValue('A10', 'Byggestrøm ønskes fra d. '.$data["Project"]["build_start"].' til '.$data["Project"]["build_end"]) //byggestrøm periode
		            ->setCellValue('A12', ''); //billedekommentar

        //enheder
        $no = 28;
        $total_power_usage = 0;
        foreach($data["Item"] as $key=>$array) {

            if (!$array['item_id']) {
                $title = $array["title"];
                $usage = $array["power_usage"];
            }else {
                $title = $array["Item"]["title"];
                $usage = $array["Item"]["power_usage"];
            }
            $quantity = $array["quantity"];


            
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$no, $title) //navn
                ->setCellValue('H'.$no, $usage) //watt forbrug
                ->setCellValue('I'.$no, $quantity) //antal enheder
                ->setCellValue('J'.$no, ($usage*$quantity)); //watt forbrug ialt
            $no++;
            $total_power_usage += $usage*$quantity;
        }
        
        //add line breaks
        $no+=2;

        //total power_usage
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$no, 'Forbrug i alt:') //label
                ->setCellValue('J'.$no, $total_power_usage); //total usage

        //do some styling
        $objPHPExcel->getActiveSheet()->getStyle('A'.$no)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$no)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        /** attach if image exists **/
        $image_path = '../webroot/attachments/photos/default/'.$data["Project"]["file_path"];

        if(is_file($image_path)) {
            //create drawing - instantiate new drawing object
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo');
            $objDrawing->setPath($image_path);
            //$objDrawing->setHeight(36);
            $objDrawing->setCoordinates('B3');

            //Set to image worksheet
            $objPHPExcel->setActiveSheetIndex(1);

            //add the above drawing to the worksheet,
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
        }

        // Rename sheet
        //$objPHPExcel->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        //$objPHPExcel->setActiveSheetIndex(0);

        //Create new sheet
        //$objWorksheet1 = $objPHPExcel->createSheet();
        //$objWorksheet1->setTitle('Another sheet');

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="roskilde_el-booking_'.$data["Project"]["id"].'.xls"');

        //excel 2007 (Excel2007)
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //header('Content-Disposition: attachment;filename="01simple.xlsx"');

        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
}
?>
