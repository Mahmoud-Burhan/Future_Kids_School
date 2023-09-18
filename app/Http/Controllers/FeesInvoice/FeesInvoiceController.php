<?php

namespace App\Http\Controllers\FeesInvoice;

use App\Http\Controllers\Controller;
use App\Repository\FeesInvoice\FeesInvoiceRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoiceController extends Controller
{
    protected $FeesInvoice;

    public function __construct(FeesInvoiceRepositoryInterface $FeesInvoice)
    {
        return $this->FeesInvoice = $FeesInvoice;
    }

    public function index()
    {
        return $this->FeesInvoice->index();
    }

    public function show($id)
    {
        return $this->FeesInvoice->show($id);
    }

    public function getAmount($id)
    {
        return $this->FeesInvoice->getAmount($id);
    }

    public function store(Request $request)
    {
        return $this->FeesInvoice->store($request);
    }

    public function create()
    {

    }

    public function edit($id)
    {
        return $this->FeesInvoice->edit($id);
    }


    public function update(Request $request, $id)
    {
        //
        return $this->FeesInvoice->update($request,$id);
    }


    public function destroy(Request $request,$id)
    {
        return $this->FeesInvoice->destroy($request,$id);
    }
}
