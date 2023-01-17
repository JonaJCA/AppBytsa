
<?php
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Modelos\Colaboradores;

    class PDF extends FPDF {
        function Header()
                {
                $this->SetFont('Helvetica','B',8);
                $this->Image('../public/images/LogoB.jpg',9,8,40);
                $this->setXY(60,10);
                $this->Cell(100, 10,utf8_decode("Relación del Personal - Planilla Actual " ),1,1,'C',0); 
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
            
   $colaboradores = Colaboradores::all();
        $pdf = new PDF();
        $pdf->AliasNbPages();       
        $pdf->AddPage();      
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20); //Salto de pagina
        $pdf->SetX(15);
        $pdf->Cell(10,8,'N',1,0,'C',0);
        $pdf->Cell(30,8,'Nombre',1,0,'C',0);
        $pdf->Cell(30,8,'Apellido',1,0,'C',0);
        $pdf->Cell(25,8,'Documento',1,0,'C',0);
        $pdf->Cell(25,8,'Telefono',1,0,'C',0);
        $pdf->Cell(35,8,'Cuenta Bancaria',1,1,'C',0);
        $pdf->SetFillColor(233,229,235);
        $pdf->SetDrawColor(61,61,61);
        $i = 1;
        foreach($colaboradores as $colaborador){
            $pdf->setX(15);
            $pdf->Cell(10,8,$i,1,0,'C',1);
            $pdf->Cell(30,8,$colaborador->nombre_emple,1,0,'C',0);
            $pdf->Cell(30,8,$colaborador->apepat_emple,1,0,'C',0);
            $pdf->Cell(25,8,$colaborador->docu_emple,1,0,'C',0);
            $pdf->Cell(25,8,$colaborador->telefono_emple,1,0,'C',0);
            $pdf->Cell(35,8,$colaborador->cuenta_emple,1,1,'C',0);
            $i++;

        }

       
       


        $pdf->Output();
        exit;  
?>