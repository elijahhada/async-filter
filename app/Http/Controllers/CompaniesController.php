<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Company;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::with('user')->with('services')->get();
        return view('home', ['companies' => $companies]);
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query');
            
            if($query != '')
            {
                $data = Company::whereHas('services', function($q) use ($query){
                    $q->where('services.name', 'LIKE', '%'.$query.'%');
                })->get();
            }
            else
            {
                $data = Company::all();
            }
            $total_row = $data->count();
            $output = '';
            if($total_row > 0)
            {
                foreach($data as $key => $company){
                    $output .= 
                    '<div class="content_item">
                        <div class="row table_items">
                            <div class="col-1">
                                '. $company->id .'
                            </div>
                            <div class="col-4">
                                '. $company->name .'
                            </div>
                            <div class="col-3">
                                '. $company->user->name .'
                            </div>
                            <div class="col-3">
                                '. $company->user->email .'
                            </div>
                            <div class="col-1 arrows">
                                <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    <div class="services_container">
                        <p class="services_title">Услуги компании' . $company->name . '</p>
                        <div class="row services">';
                    foreach($company->services as $key => $service){
                        $output .= '<div class="col-1">
                        ' . ($key + 1) . '</div><div class="col-1">';
                        if($key==0){
                            $output .= '<i class="fa fa-cart-plus"></i>';
                        }elseif($key==1){
                            $output .= '<i class="fa fa-car"></i>';
                        }else{
                            $output .= '<i class="fa fa-university"></i>';
                        }
                        $output .= '</div>
                        <div class="col-10">
                            ' . $service->name . '
                        </div>';
                    }
                    $output .= '</div></div></div>';
                }
            }
            else
            {
                $output = '<div class"table_items">Не найдено ни одной компании по запросу</div>';
            }
            $response = array('data' => $output);
            return json_encode($response);
        }
    }
}
