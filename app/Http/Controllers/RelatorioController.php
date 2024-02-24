<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Jaspersoft\Client\Client;

class RelatorioController extends Controller
{
    public function imprimirObjeto(Request $request)
    {

        $parametros = [
            'pEsObjetoId' => $request->input('esObjetoId'),
        ];

        $relatorio = [
            'url' => '/reports/patrimonio/objeto',
            'formatoSaida' => 'pdf'
        ];
//dd(Config('jasperConfig.JASPER_SERVER_URL'));
        $client = new Client(
            Config('jasperConfig.JASPER_SERVER_URL')
            , Config('jasperConfig.JASPER_SERVER_USU')
            , Config('jasperConfig.JASPER_SERVER_PWD')
        );

        $report = $client->reportService()->runReport(
            $relatorio["url"]
            , $relatorio["formatoSaida"]
            , null
            , null
            , $parametros);

        $nomeArquivo = md5(now());

        $headers = [
            'Content-Type' => 'application/pdf',
            'filename=$nomeArquivo.pdf',
        ];

        Storage::put("public/relatorios/{$relatorio['formatoSaida']}", $report);

        return response()->download(
            storage_path("app/public/relatorios/{$relatorio['formatoSaida']}"),
            "$nomeArquivo.{$relatorio['formatoSaida']}",
            $headers
        );

    }
    public function imprimirObjetos(Request $request)
    {

        $parametros = [
            'tipoSetorId' => $request->input('tipoSetorId'),
        ];

        $relatorio = [
            'url' => '/reports/patrimonio/objetos',
            'formatoSaida' => 'pdf'
        ];

        $client = new Client(
            Config('jasperConfig.JASPER_SERVER_URL')
            , Config('jasperConfig.JASPER_SERVER_USU')
            , Config('jasperConfig.JASPER_SERVER_PWD')
        );

        $report = $client->reportService()->runReport(
            $relatorio["url"]
            , $relatorio["formatoSaida"]
            , null
            , null
            , $parametros);

        $nomeArquivo = md5(now());

        $headers = [
            'Content-Type' => 'application/pdf',
            'filename=$nomeArquivo.pdf',
        ];

        Storage::put("public/relatorios/{$relatorio['formatoSaida']}", $report);

        return response()->download(
            storage_path("app/public/relatorios/{$relatorio['formatoSaida']}"),
            "$nomeArquivo.{$relatorio['formatoSaida']}",
            $headers
        );

    }
    public function index(){
        return view('relacao');
    }
}
