<?php

namespace App\Http\Controllers;

use App\Exports\HistoryExport;
use Illuminate\Http\Request;
use DataTables;
use App\Histori;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;



class HistoryController extends Controller
{
    public function index()
    {
        return \view('Histori.histori');
    }

    public function loadTableHistory()
    {
        return \view('datatable.TableHistory');
    }

    public function LoadDataHistory(){
        $history = Histori::orderBy('id','desc')->get();

        return Datatables::of($history)->addIndexColumn()->editColumn('created_at', function($history){
            return date('h:i:s | d-m-Y', strtotime($history->created_at));
        })->make(true);
    }

    public function TodayHistory(){
        $data = Histori::whereDate('created_at', Carbon::today())->orderBy('id','desc')->get();
        $user = auth()->user()->name;

        return response([
            'data' => $data,
            'user' => $user
        ]);
    }

    public function HistoryClicked($id){
        $h = Histori::find($id);
        $h->status = "clicked";
        $h->save();

        return response([
            'message' => 'clicked'
        ]);
    }

    public function CountTodayHistory(){
        $data = Histori::where('status',null)->whereDate('created_at', Carbon::today())->orderBy('id','desc')->get();
        $total = count($data);

        return response([
            'total' => $total,
        ]);
    }

    public function export_excel(){
        return Excel::download(new HistoryExport, 'History - '.now()->locale('id')->isoFormat('LLLL').'.xlsx');
    }

    public function export_pdf(){
        $history = Histori::all();
        $pdf = PDF::loadview('PDF/HistoryPdf',['history'=>$history]);
        return $pdf->download('History - '.now()->locale('id')->isoFormat('LLLL').'.pdf');
    }

}
