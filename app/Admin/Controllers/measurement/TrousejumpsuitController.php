<?php

namespace App\Admin\Controllers\measurement;

use App\Admin\Actions\Mytransaction;
use App\Admin\Actions\Newrecord;
use App\Admin\Actions\Pay;
use App\Admin\Actions\Statusupdate;
use App\Models\Clients;
use App\Models\Dressblouseskirt;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Trousejumpsuit;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Table;

class TrousejumpsuitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Trouser / Jumpsuit';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Dressblouseskirt());
        $table->model()->where('measuretype','TrouserJumpsuit');

        $table->column('id', __('Id'));
        $table->column('client.name', __('Name'));
        $table->column('client.adrress', __('Adrress'));
        $table->column('client.tel', __('Tel'));
        $table->column('date', __('Date'));
        $table->column('waist', __('Waist'))->hide();
        $table->column('hip', __('Hip'))->hide();
        $table->column('waisttohip', __('Waisttohip'))->hide();
        $table->column('waisttoknee', __('Waisttoknee'))->hide();
        $table->column('waisttocalf', __('Waisttocalf'))->hide();
        $table->column('waisttofloor', __('Waisttofloor'))->hide();
        $table->column('around knee', __('Around knee'))->hide();
        $table->column('thigh', __('Thigh'))->hide();
        $table->column('calf', __('Calf'))->hide();
        $table->column('ankle', __('Ankle'))->hide();
        $table->column('seat', __('Seat'))->hide();
        $table->column('trouserlength', __('Trouserlength'))->hide();
        $table->column('style', __('Style'))->hide();
        $table->column('typeofmaterial', __('Typeofmaterial'))->hide();
        $table->column('note', __('Note'));

        $table->rows(function ($row) {
         if ($row->column('status') == '1' ) {
            $row->style("background-color:#3f729b;color:#fff;");
        }
        });

        $table->column('amountcharge', __('Amount Charge'))
        ->display(function(){
            return 'GH&cent;'.$this->client->payment['amountcharge'];
        });

        $table->column('amountpaid', __('Amount Paid'))->display(function(){
            return 'GH&cent;'.$this->client->payment['amountpaid'];
        });

        $table->column('amountleft', __('Amount Left'))->display(function(){
            return 'GH&cent;'.$this->client->payment['amountleft'];
        });

        $table->column('status', __('status'))->hide();
        
        $table->column('vstatus', __('Status'))->display(function(){

            if ($this->status == '0') {
                return '<label class="badge badge-info">Processing..</label>';
            }

            if ($this->status == '1') {
                return '<label class="badge badge-success">Received..</label>';
            }
        });

        $table->column('created_at', __('Created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });

        $table->column('updated_at', __('Updated at'))->hide();

        //$table->modalForm();

        $table->filter(function($filter){

            $filter->disableIdFilter();

           // $filter->expand();

            $filter->equal('client.name',__('Search Name'))->select(Clients::select('name','id')
                ->pluck('name','name'));

            $filter->equal('client.tel',__('Phone'));

        });

        $table->actions(function($actions){
            $actions->add(new Statusupdate());
            $actions->add(new Mytransaction());
            $actions->add(new Newrecord());
            $actions->add(new Pay());
            $actions->disableDelete();
        });

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
        $show = new Show(Dressblouseskirt::findOrFail($id));

        //$show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('name', __('Name'));
        $show->field('adrress', __('Addrress'));
        $show->field('tel', __('Tel'));
        $show->field('date', __('Date'));
        $show->field('waist', __('Waist'));
        $show->field('hip', __('Hip'));
        $show->field('waisttohip', __('Waist tohip'));
        $show->field('waisttoknee', __('Waist t oknee'));
        $show->field('waisttocalf', __('Waist to calf'));
        $show->field('waisttofloor', __('Waist to floor'));
        $show->field('aroundknee', __('Around knee'));
        $show->field('thigh', __('Thigh'));
        $show->field('calf', __('Calf'));
        $show->field('ankle', __('Ankle'));
        $show->field('seat', __('Seat'));
        $show->field('trouserlength', __('Trouser length'));
        $show->field('style', __('Style'));
        $show->field('typeofmaterial', __('Type of material'));
        $show->field('note', __('Note'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    public function show($id, Content $content)
    {
        $data = Dressblouseskirt::where('id',$id)->first();

        return $content->view('show-tr-suit',compact('data'));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Clients());

        $form->tab(__('Measurement'), function ($form) {
        $form->hidden('measurement.measuretype')->value('TrouserJumpsuit');

        $form->text('name', __('Name'))->rules('required');
        $form->textarea('adrress', __('Adrress'))->rules('required');
        $form->text('tel', __('Tel'))->rules('required|min:10');
        $form->image('image',__('Customer Image'));
        $form->date('measurement.date', __('Date'))->rules('required');
        $form->select('measurement.measurefor', __('Recording Measurement For'))
        ->options(['Trouser' => 'Trouser', 'Jumpsuit' => 'Jumpsuit'])->rules('required');
        $form->text('measurement.waist', __('Waist'));
        $form->text('measurement.hip', __('Hip'));
        $form->text('measurement.waisttohip', __('Waist to hip'));
        $form->text('measurement.waisttoknee', __('Waist to knee'));
        $form->text('measurement.waisttocalf', __('Waist to calf'));
        $form->text('measurement.waisttofloor', __('Waist to floor'));
        $form->text('measurement.aroundknee', __('Around knee'));
        $form->text('measurement.thigh', __('Thigh'));
        $form->text('measurement.calf', __('Calf'));
        $form->text('measurement.ankle', __('Ankle'));
        $form->text('measurement.seat', __('Seat'));
        $form->text('measurement.trouserlength', __('Trouser length'));
        $form->textarea('measurement.style', __('Style'));
        $form->text('measurement.typeofmaterial', __('Type of material'));
        $form->textarea('measurement.note', __('Note'));

        })->tab('Payment Information', function ($form){

        $form->text('payment.amountcharge', __('Amount Charge'))->rules('required');

        $form->hidden('payment.amountpaid', __('Amount Paid'))->value(0);
        ///$form->hidden('payment.amountleft', __('Amount Paid'));
            
    });

    $form->saved(function($form){

        $id = $form->model()->id;
        $charge = $form->payment['amountcharge'];
        $amountpaid = $form->payment['amountpaid'];


        if ($form->isCreating()) {

            $left = $charge - $amountpaid;
            $update = Payment::where('cat_id',$id)->first();
            $update->amountleft = $left;
            $update->save();

            Transaction::create([
                'cat_id' => $id,
                'amountcharge' => $form->payment['amountcharge'],
                'amountpaid' => $form->payment['amountpaid'],
                'amountleft' => $left,
                'reference' => 'Paying For '.$form->measurement['measurefor'],
                'pay_id' => $update->id
            ]);


            return Redirect()->to('/admin/make-payment');
        }


        if ($form->isEditing()) {

            $left = $charge - $amountpaid;
            $update = Payment::where('cat_id',$id)->first();
            $update->amountleft = $left;
            $update->save();

            $tr = Transaction::where('pay_id',$update->id)->first();
            $tr->amountpaid = $form->payment['amountpaid'];
            $tr->amountcharge = $form->payment['amountcharge'];
            $tr->amountleft = $left;
            $tr->reference = 'Paying For '.$form->measurement['measurefor'];
            $tr->save();

            return Redirect()->to('/admin/make-payment');

        }


    });

        return $form;
    }
}
