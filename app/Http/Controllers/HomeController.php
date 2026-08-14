<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatalogController;

class HomeController extends Controller
{
    public function getHome()
    {
        // Redirecciona directamente a la acción getIndex de CatalogController
        return redirect()->action([CatalogController::class, 'getIndex']);
    }
}
