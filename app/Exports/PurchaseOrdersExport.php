<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseOrdersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('components.user.export_po', ['export_pos' => PurchaseOrder::all()]);
        
    }
}
