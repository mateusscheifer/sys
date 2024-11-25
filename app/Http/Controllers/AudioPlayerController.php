<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudioPlayerController extends Controller
{
    public function stream()
    {
        $path = storage_path("app/public/audio/DQHJFVW003E5SyNGvffICdqIKAbNJp0IX9mdgHHy.mp3");

        if (!file_exists($path)) {
            abort(404);
        }

        $filesize = filesize($path);
        $range = request()->header('Range');
        $start = 0;
        $end = $filesize - 1;

        // Verifica se o cliente enviou um header "Range"
        if ($range) {
            // Exemplo de Range: "bytes=2000-"
            list(, $range) = explode('=', $range, 2);
            $range = explode('-', $range);
            $start = intval($range[0]);

            // Se tiver um valor final no range, usamos ele, caso contrário, o final do arquivo
            if (isset($range[1]) && is_numeric($range[1])) {
                $end = intval($range[1]);
            }
        }

        $length = $end - $start + 1;

        $stream = function() use ($path, $start, $end) {
            $stream = fopen($path, 'rb');
            fseek($stream, $start);

            while (!feof($stream) && ftell($stream) <= $end) {
                echo fread($stream, 1024 * 8); // Envia 8KB de cada vez
                ob_flush();
                flush();
            }

            fclose($stream);
        };

        $headers = [
            'Content-Type' => 'audio/mpeg',
            'Content-Length' => $length,
            'Accept-Ranges' => 'bytes',
            'Content-Range' => "bytes $start-$end/$filesize",
        ];

        return response()->stream($stream, $range ? 206 : 200, $headers);
    }
}
