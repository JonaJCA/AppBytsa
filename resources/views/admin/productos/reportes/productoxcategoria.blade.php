
<?php
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Modelos\Categoria;
use App\Modelos\Producto;

    class PDF extends FPDF{
        function Header()
                {
                $this->SetFont('Helvetica','B',8);
                $this->Cell(50,15,$this->Image('../public/images/LogoB.jpg',12,11,45),1,0);
                $this->setXY(60,10);
                $this->Cell(100, 15,utf8_decode("Relación del Productos por Categoria"),1,0,'C',0); 
                $this->Cell(40,5,utf8_decode("Código :  F-LOG-01-P-05 " ),1,1);
                $this->setX(160);
                $this->Cell(40,5,utf8_decode("Version  :  00 " ),1,1);
                $this->setX(160);
                $this->Cell(40,5,utf8_decode("Fecha   :  2023-01-20 " ),1,1); 
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

        
        $pdf = new PDF();
        $pdf->AliasNbPages(); 
        $pdf->AddPage();      
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20); //Salto de pagina        
        $pdf->SetX(10);
        $pdf->Cell(30,8,utf8_decode('Categoría elegida:'),0,0,'R',0);
        $pdf->Cell(30,8,utf8_decode($consulta->nombre_cate),0,1,'L',0);
        $pdf->SetX(10);
        $pdf->Cell(7,8,'N',1,0,'C',0);
        $pdf->Cell(63,8,utf8_decode('Descripción'),1,0,'C',0);
        $pdf->Cell(55,8,'Caracterisica',1,0,'C',0);
        $pdf->Cell(40,8,'Marca',1,0,'C',0);
        $pdf->Cell(25,8,'Costo',1,1,'C',0);
        $pdf->SetFillColor(233,229,235);
        $pdf->SetDrawColor(61,61,61);
        $i = 1;
       
        
        
        foreach($consulta->productos as $produ){
             $pdf->setX(10);
            $pdf->Cell(7,8,$i,1,0,'C',1);
            $pdf->Cell(63,8,utf8_decode($produ->nombre_produ),1,0);
            $pdf->Cell(55,8,utf8_decode($produ->caracteristica_produ),1,0,'C',0);
            $pdf->Cell(40,8,utf8_decode($produ->marca_producto),1,0,'C',0);      
            $pdf->Cell(25,8,utf8_decode("S/ $produ->costo_producto"),1,1,'C',0);
            $i++;

        }

       
       


        $pdf->Output();
        exit;  
?>