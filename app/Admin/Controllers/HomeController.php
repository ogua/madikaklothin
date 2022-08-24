<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apprentice;
use App\Models\Dressblouseskirt;
use App\Models\Employees;
use App\Models\Transaction;
use App\Models\User;
use Encore\Admin\Http\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        
        $totalusers = User::all()->count();

        $allemployee = Employees::all()->count();

        $allapprentices = Apprentice::all()->count();

        $allshirtblouse = Dressblouseskirt::where('measuretype','DressBlouseSkirt')
        ->get()->count();

        $alljumpsuit = Dressblouseskirt::where('measuretype','TrouserJumpsuit')
        ->get()->count();

        $totaltoday = Transaction::whereDate('created_at', \Carbon\Carbon::today())->sum('amountpaid');

       $totalmonth = Transaction::whereMonth('created_at', date('m'))
       ->sum('amountpaid');

       $totalyear = Transaction::whereYear('created_at', date('Y'))->sum('amountpaid');

       $expectedowings = Transaction::whereYear('created_at', date('Y'))->sum('amountleft');


        return $content
            ->title('Dashboard')
            ->view('dashboard.info',compact('totalusers','allemployee','allapprentices','allshirtblouse','alljumpsuit','totaltoday','totalmonth','totalyear','expectedowings'));

            // ->description('Description...')
            // ->row(Dashboard::title())
            // ->row(function (Row $row) {

            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::environment());
            //     });

            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::extensions());
            //     });

            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::dependencies());
            //     });
            // });
    }
}
