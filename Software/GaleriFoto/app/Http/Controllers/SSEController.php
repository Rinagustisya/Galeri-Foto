<?php

namespace App\Http\Controllers;
use App\Models\Foto;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
class SSEController extends Controller
{
    public function stream(Request $request)
    {
        $response = new StreamedResponse(function () {
                $latestEntry = Foto::latest()->first();
                echo "data: " . json_encode($latestEntry) . "\n\n";
                ob_flush();
                flush();
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connection', 'keep-alive');

        return $response;
    }
}
