<?php
    // ejemplo hello world
    require('fpd/fpdf.php');

    //se instancia el objeto del p FPDF 
    // $pdf = new FPDF();

    //para la orientación de la pagina se utiliza p portrait(vertical), l landscape(horizontal)
    // el segúndo valor indica la unidad de medida utilizada para espacios o ubicación, valores 
    $pdf = new FPDF('p','mm','letter');

    //función para agregar una pagina nueva 
    $pdf->AddPage();
    //función para configurar fuente del documento
    $pdf->SetFont('Arial','B',16);
    //contenido de la pagina
    
    //el primer valor 
    // para la orientación del texto se utiliza L left, C center, R right
    $pdf->Cell(0,10,'Hola Mundo.',0,1,'R');
    $pdf->Ln(5);
    $pdf->Cell(20,0,'Hola Mundo.');
    $pdf->Output();
?>
