<?php

namespace App\Admin\Actions;

use App\Models\Payment;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Newrecord extends RowAction
{
    public $name = 'New record';

    public function handle(Model $model, Request $request)
    {
        
        $tran = Payment::where('cat_id',$model->id)->first();

        $tran->amountcharge = $request->amountcharge;
        $tran->amountpaid = $request->amountpaid;
        $tran->save();

        return $this->response()->success('New record updated successfully!...')->refresh();
    }

    public function form()
    {
        $this->text('amountcharge', __('Amount Charge'))->rules('required')->value(0);

        $this->text('amountpaid', __('Amount Paid'))->rules('required')->value(0);
    }
}