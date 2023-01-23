<?php

namespace App\Controllers;

use App\Models\ReportModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new ReportModel();
        // $id = $this->request->getGet('id');
        // $storeid = $this->request->getGet('store_id');
        // $data = $model->where('report_product.product_id',$id)
        //     ->where('report_product.store_id',$storeid)
        //     ->join('product','product.product_id = report_product.product_id','inner')
        //     ->findAll();
        return view('data');
    }
}
