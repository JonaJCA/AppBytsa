
<?php
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Modelos\Colaboradores;
use App\Modelos\Foto;



    class PDF extends FPDF {
        function Header()
                {
                $this->SetFont('Helvetica','B',10);
                $this->Image('../public/images/LogoB.jpg',9,8,40);
                $this->setXY(60,10);
                $this->Cell(100, 15,utf8_decode("FICHA PERSONAL" ),1,0,'C',0); 
                $this->SetFont('Helvetica','',8);
                $this->Cell(35, 5,utf8_decode("Código: F-RH-01-P-00" ),1,1,'L',0); 
                $this->setXY(160,15);
                $this->Cell(35, 5,utf8_decode("Versión: 02" ),1,1,'L',0); 
                $this->setXY(160,20);
                $this->Cell(35, 5,utf8_decode("Fecha: 2009-07-06" ),1,1,'L',0); 
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
                    $this->Cell(0,10,'Fecha: '.date('d/m/Y'), 0, 0, 'R');
                }
    }
   

        $pdf = new PDF();
        $pdf->AliasNbPages();       
        $pdf->AddPage();      
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20); //Salto de pagina
        $pdf->SetX(15);
        $pdf->Image('../public/images/'.$fotos->ruta_foto,155,40,40);
        $pdf->Cell(30,8,'DATOS PERSONALES.-',0,1,'L',0);
        $pdf->Cell(70,8,'Nombres: ',0,0,'L',0);
        $pdf->Cell(30,8,'Apellidos: ',0,1,'L',0);
        $pdf->Cell(70,8,$colaboradores->nombre_emple,1,0,'L',0);
        $pdf->Cell(70,8,$colaboradores->apepat_emple ." " . $colaboradores->apemat_emple,1,1,'L',0);
        $pdf->Cell(30,8,'Domicilo: ',0,1,'L',0);
        $pdf->Cell(140,8,$colaboradores->direccion_emple,1,1,'L',0);
        $pdf->Cell(40,8,'Fecha Nacimiento: ',0,0,'L',0);
        $pdf->Cell(40,8,'Lugar de Nacimiento',0,0,'C',0);
        $pdf->Cell(40,8,'Estado Civil',0,0,'C',0);
        $pdf->Cell(20,8,utf8_decode('Nº Hijos'),0,1,'C',0);
        $pdf->Cell(40,8,$colaboradores->fecna_emple,1,0,'C',0);
        $pdf->Cell(40,8,'-',1,0,'C',0);
        $pdf->Cell(40,8,'-',1,0,'C',0);
        $pdf->Cell(20,8,'-',1,1,'C',0);
        $pdf->SetX(15);
        $pdf->Cell(30,8,'DOCUMENTOS PERSONALES.-',0,1,'L',0);
        $pdf->Cell(25,8,'DNI: ',0,0,'L',0);
        $pdf->Cell(60,8,'Cuenta Bancaria:',0,0,'L',0);
        $pdf->Cell(70,8,'Correo Electronico:',0,0,'L',0);
        $pdf->Cell(30,8,utf8_decode('Nº Celular'),0,1,'L',0);
        $pdf->Cell(25,8,$colaboradores->docu_emple,1,0,'C',0);
        $pdf->Cell(60,8,$colaboradores->cuenta_emple,1,0,'C',0);
        $pdf->Cell(70,8,$colaboradores->email_emple,1,0,'C',0);
        $pdf->Cell(30,8,$colaboradores->telefono_emple,1,1,'C',0);
        $pdf->SetFillColor(233,229,235);
        $pdf->SetDrawColor(61,61,61);
        $pdf->SetX(15);
        $pdf->Cell(30,8,utf8_decode('FORMACIÓN EDUCATIVA.-'),0,1,'L',0);
        $pdf->Cell(40,8,'ESTUDIOS SECUNDARIOS: ',0,0,'L',0);
        $pdf->Cell(145,8,' - ',1,1,'L',0);
        $pdf->Cell(145,3,' ',0,1,'L',0);
        $pdf->Cell(40,8,utf8_decode('SUPERIOR / TÉCNICO: '),0,0,'L',0);
        $pdf->Cell(145,8,' - ',1,1,'L',0);
        $pdf->Cell(145,3,' ',0,1,'L',0);
        $pdf->Cell(40,8,utf8_decode('ESPECIALIDAD / OFICIO: '),0,0,'L',0);
        $pdf->Cell(145,8,' - ',1,1,'L',0);

        
        
            
            
            

        

       
       


        $pdf->Output();
        exit;  
?>
