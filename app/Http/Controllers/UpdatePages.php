<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class UpdatePages extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        switch ($request->page) {
            case 'sejarah':
                
                break;
            case 'visi-misi':
                
                break;

            default:
                # code...
                break;
        }
    }
}
