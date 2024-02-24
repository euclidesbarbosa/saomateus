<?php

    $url = public_path("jsreport/autoload.dist.php");

    require_once $url;

    use Jaspersoft\Client\Client;

    $formato = "PDF";

    $client = new Client("famem.ddns.net:8080/jasperserver", "jasperadmin", "jasperadmin");

    $report = $client->reportService()->runReport($relatorio['url'], $formato, NULL, NULL, $parametros);

    header('Content-Type: application/'.$formato);

	header("Content-Disposition: attachment; filename=Relatorio.".$formato);

    echo $report;