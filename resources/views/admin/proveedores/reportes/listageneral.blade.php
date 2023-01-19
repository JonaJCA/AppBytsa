<?php
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Modelos\Proveedor;

    class PDF extends FPDF {
        function Header()
                {
                $this->SetFont('Helvetica','B',8);
                $this->Cell(50,15,$this->Image('../public/images/LogoB.jpg',12,11,45),1,0);
                $this->setXY(60,10);
                $this->Cell(100, 15,utf8_decode("Relación de Proveedores - Actuales " ),1,0,'C',0);
                $this->Cell(40,5,utf8_decode("Código :  F-LOG-01-P-03 " ),1,1);
                $this->setX(160);
                $this->Cell(40,5,utf8_decode("Version  :  00 " ),1,1);
                $this->setX(160);
                $this->Cell(40,5,utf8_decode("Fecha   :  2005-05-25 " ),1,1); 
                $this->Ln(10);    
                }
        function Footer()
                {
                    // Posición: a 1,5 cm del final
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Número de página
                    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
                }
    }
            
   $proveedores = Proveedor::all()->sortByDesc('razon_social');
        $pdf = new PDF();
        $pdf->AliasNbPages();       
        $pdf->AddPage();      
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20); //Salto de pagina
        $pdf->SetX(10);
        $pdf->Cell(7,8,'N',1,0,'C',0);
        $pdf->Cell(43,8,'Razon Social',1,0,'C',0);
        $pdf->Cell(16,8,'Tipo',1,0,'C',0);
        $pdf->Cell(25,8,utf8_decode('Nº Documento'),1,0,'C',0);
        $pdf->Cell(20,8,'Telefono',1,0,'C',0);
        $pdf->Cell(30,8,'Cuenta Bancaria',1,0,'C',0);
        $pdf->Cell(50,8,'Correo',1,1,'C',0);
        $pdf->SetFillColor(233,229,235);
        $pdf->SetDrawColor(61,61,61);
        $i = 1;
        foreach($proveedores as $proveedor){
            $pdf->setX(10);
            $pdf->Cell(7,8,$i,1,0,'C',1);
            $pdf->Cell(43,8,$proveedor->razon_social,1,0);
            $pdf->Cell(16,8,$proveedor->tipodocu_provee,1,0,'C',0);
            $pdf->Cell(25,8,$proveedor->docu_provee,1,0,'C',0);
            $pdf->Cell(20,8,$proveedor->telefono_provee,1,0,'C',0);
            $pdf->Cell(30,8,$proveedor->cuenta1_provee,1,0,'C',0);
            $pdf->Cell(50,8,$proveedor->email_provee,1,1);
            $i++;

        }

       
       


        $pdf->Output();
        exit;  
?>