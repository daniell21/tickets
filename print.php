<?php 

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

    if(isset($_POST['crear'])){
        ob_start();
        require_once 'invoice.php';
        $html = ob_get_clean();

        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
        $html2pdf->writeHTML($html);
        $html2pdf->output('ticket.pdf');
    }
?>

<form action="" method="POST">    
    <input type="submit" value="Generar Recibo" name="crear" />
</form>