<?php

namespace App\Http\Controllers;

use App\DataTables\AuditingDataTable;
use App\Models\Audit;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($id)
    {
        $dataTable = new AuditingDataTable($id);

        return $dataTable->render('transactionHistory.index', compact('id'));
    }
}
