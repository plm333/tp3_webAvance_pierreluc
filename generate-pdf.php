<?php
//  Je n'ai pas eu le temps de terminer malheureusement 

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$name = $_POST["name"];
$quantity = $_POST["quantity"];

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

$dompdf->setPaper("A4", "landscape");

$html = file_get_contents("template.html");

$html = str_replace(["{{ name }}", "{{ quantity }}"], [$name, $quantity], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

$dompdf->render();

$dompdf->addInfo("Title", "An Example PDF"); // "add_info" in earlier versions of Dompdf

$dompdf->stream("invoice.pdf", ["Attachment" => 0]);

$output = $dompdf->output();
file_put_contents("file.pdf", $output);