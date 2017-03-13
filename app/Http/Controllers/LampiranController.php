<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Response;

class LampiranController extends Controller
{
    //

    public function downloadLampiranAnggaran(Request $r, $filename = null)
    {
        if ($filename != null) {
            $ct['Content-Type'] = File::extension($filename);
            
            if ($r->dl != null AND $r->dl == 1) {
                $ct['Content-Type'] = 'application/' . File::extension($filename);
            }

            return Response::make(file_get_contents(storage_path('/uploads/lampiran_anggaran/' . $filename)), 200, $ct);
        }

        abort(404);
    }
}
