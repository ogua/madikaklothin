<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Appstatusupdate extends RowAction
{
    public $name = 'Update Status';

    public function handle(Model $model, Request $request)
    {
        // $request ...
        $model->status = $request->status;
        $model->save();

        return $this->response()->success('Status Updated Successfully!')->refresh();
    }

    public function form()
    {
        $this->select('status',__('Update Status'))->options([
            '0' => 'Stopped...', '1' => 'Active...', '2' => 'Graduated...'
        ]);
    }
}