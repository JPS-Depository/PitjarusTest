<?php

namespace App\Controllers;

use App\Models\ReportModel;
use App\Models\AreaModel;
use App\Models\ProductBrandModel;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $report = new ReportModel();
        $area = new AreaModel();
        $brand = new ProductBrandModel();
        $startDate = $this->request->getGet('startDate');
        $endDate = $this->request->getGet('endDate');
        $querytext = "";
        $checkboxes = array();
        if(isset($_GET['checkboxes'])){
            $checkboxes = $_GET['checkboxes'];
            for($i=0;$i<count($checkboxes);$i++){
                if($i==count($checkboxes)-1){
                    $querytext .= "store_area.area_id = {$checkboxes[$i]}";
                }else{
                    $querytext .= "store_area.area_id = {$checkboxes[$i]} OR ";
                }
            }
        }
        $areaQuery = $area->orderBy('area_name')->findAll();
        $brandQuery = $brand->orderBy('brand_name')->findAll();
        $areaData = $area
            ->when($querytext, static function($query,$querytext){
                $query->where($querytext);
            })
            ->orderBy('area_name')->findAll();
        $reportQuery = $report
            ->select('sum(compliance) as SumCompliance')
            ->select('brand_name')
            ->select('area_name')
            ->select('store_area.area_id')
            ->join('product','product.product_id = report_product.product_id','inner')
            ->join('product_brand', 'product_brand.brand_id = product.brand_id')
            ->join('store','report_product.store_id = store.store_id')
            ->join('store_area','store_area.area_id = store.area_id')
            ->when($querytext, static function($query,$querytext){
                $query->where($querytext);
            })
            ->when($startDate, static function($query,$startDate){
                $query->where('report_product.tanggal >=', $startDate);
            })
            ->when($endDate, static function($query,$endDate){
                $query->where('report_product.tanggal <=', $endDate);
            })
            ->groupBy('area_name,brand_name')
            ->orderBy('area_name')
            ->findAll();
        $totalData = $report->select('count(*) as Total')->first();   
        $chartQuery = $report
            ->select('sum(compliance) as SumCompliance')
            ->select('area_name')
            ->join('store','report_product.store_id = store.store_id')
            ->join('store_area','store_area.area_id = store.area_id')
            ->when($querytext, static function($query,$querytext){
                $query->where($querytext);
            })
            ->when($startDate, static function($query,$startDate){
                $query->where('report_product.tanggal >=', $startDate);
            })
            ->when($endDate, static function($query,$endDate){
                $query->where('report_product.tanggal <=', $endDate);
            })
            ->groupBy('area_name')
            ->orderBy('area_name')
            ->findAll();       
        $data = array(
            'reports' => $reportQuery,
            'areas' => $areaQuery,
            'brands'=>$brandQuery,
            'chart'=>$chartQuery,
            'areaD' => $areaData,
            'total' => $totalData,
            'startDate'=> $startDate,
            'endDate'=> $endDate
        );
        return view('data_view',$data);
    }
}

