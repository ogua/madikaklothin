<?php

namespace App\Admin\Controllers\measurement;

use App\Models\Transaction;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class TransactionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Transaction';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Transaction());

        //$table->column('id', __('Id'));
        $table->column('client.name', __('Client name'));
        //$table->column('pay_id', __('Pay id'));
        $table->column('amountpaid', __('Amount paid'))->display(function(){
            return 'GH&cent;'.$this->amountpaid;
        });
        $table->column('amountleft', __('Amount left'))->display(function(){
            return 'GH&cent;'.$this->amountleft;
        });
        $table->column('reference', __('Reference'));
        $table->column('created_at', __('Created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        //$table->column('updated_at', __('Updated at'));

        $table->disableCreateButton();


        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Transaction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('client.name', __('Client name'));
        //$show->field('pay_id', __('Pay id'));
        $show->field('amountpaid', __('Amountpaid'));
        $show->field('amountleft', __('Amountleft'));
        $show->field('reference', __('Reference'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Transaction());

        $form->display('client.name', __('Client name'));
        //$form->text('pay_id', __('Pay id'));
        $form->text('amountpaid', __('Amount paid'));
        $form->text('amountleft', __('Amountleft'));
        $form->display('reference', __('Reference'));

        return $form;
    }
}
