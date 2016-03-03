<?php
/**
 * User: sasik
 * Date: 3/2/16
 * Time: 4:58 PM
 */

namespace App\Pdf;


use FPDI;

class Pdf
{


    public function create($text)
    {
        // initiate FPDI
        $pdf = new FPDI();


        // get the page count
        $pageCount = $pdf->setSourceFile(public_path('cert.pdf'));
        // iterate through all pages
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            // import a page
            $templateId = $pdf->importPage($pageNo);
            // get the size of the imported page
            $size = $pdf->getTemplateSize($templateId);

            // create a page (landscape or portrait depending on the imported page size)
            if ($size['w'] > $size['h']) {
                $pdf->AddPage('L', array($size['w'], $size['h']));
            } else {
                $pdf->AddPage('P', array($size['w'], $size['h']));
            }

            // use the imported page
            $pdf->useTemplate($templateId);

//            $pdf->AddFont('Daxline', '', resource_path('fonts/DaxlineComp.ttf'), true);
//            $pdf->AddFont('Daxline', 'B', resource_path('fonts/DaxlineComp-Bold.ttf'), true);
//            $pdf->AddFont('Daxline', '', '');
//            $pdf->AddFont('Daxline', 'B', '');
            $pdf->SetFont('Helvetica', '', 24);
            $pdf->SetXY(32, 135);
            $pdf->Write(8, $text);
        }

// Output the new PDF
        return $pdf->Output();
    }

}