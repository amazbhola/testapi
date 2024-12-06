<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;

class WithoutApiTender extends Controller
{
    function allTender(){

        $tenders = Tender::where('last_sale_date', '>', date('Y-m-d'))->get();
        return $tenders;
    }
}
