 <?php 
 
 require_once dirname(__FILE__).'/vendor/autoload.php';
 //require_once(dirname(__FILE__).'/vendor/spipu/html2pdf/html2pdf.class.php');

use Spipu\Html2Pdf\Html2Pdf;

    if(isset($_POST['crear'])){
        ob_start();
        require_once 'invoice.php';
        /*$html = ob_get_clean();

        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
        $html2pdf->writeHTML($html);
        $html2pdf->output('ticket.pdf');*/
    }   

?>

<form action="" method="POST">    
    <input type="submit" value="Generar Recibo" name="crear" />
</form> 