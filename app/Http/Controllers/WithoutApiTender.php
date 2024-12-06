<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use DB;
use Illuminate\Http\Request;

class WithoutApiTender extends Controller
{
    function allTender()
    {

        $tenders = DB::table('tenders')->select('tenders.tender_id', 'tenders.description', 'tenders.document_price', 'tenders.tender_security', 'tenders.method', 'tenders.last_sale_date', 'tenders.liquid_amount', 'tenders.similar_works', 'tenders.turnover', 'tenders.tender_capacity', 'tenders.note',  'upazilas.name as location_name', 'departments.name as department_name')->leftJoin('upazilas', 'upazilas.id', '=', 'tenders.location_id')
            ->leftJoin('departments', 'departments.id', '=', 'tenders.department_id')->where('last_sale_date', '>', date('Y-m-d'))->get();
        return $tenders;
    }
}
