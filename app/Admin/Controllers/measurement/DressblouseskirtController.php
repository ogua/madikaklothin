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
use Coderatio\SimpleBackup\SimpleBackup;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Table;
use Illuminate\Http\Request;

class DressblouseskirtController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Dress / Blouse / Skirt';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Dressblouseskirt());
        $table->model()->where('measuretype','DressBlouseSkirt');
        
        $table->column('id', __('Id'));

        $table->column('client.image', __('Images'))->display(function($pic){
                if (empty($pic)) {

                    if ($this->gender == 'Male') {
                    return '<img src="'.url()->to('images/male.png').'" style="max-width:50px;max-height:50px" class="img img-thumbnail">';
                    }else{
                        return '<img src="'.url()->to('images/female.png').'" style="max-width:50px;max-height:50px" class="img img-thumbnail">';
                    }
                }else{
                    return '<img src="'.asset('storage').'/'.$pic.'" style="max-width:50px;max-height:50px" class="img img-thumbnail">';
                }
             });
        $table->column('client.name', __('Name'));
        $table->column('client.adrress', __('Adrress'));
        $table->column('client.tel', __('Tel'));
        $table->column('date', __('Date'));

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

        $table->rows(function ($row) {
         if ($row->column('status') == '1' ) {
            $row->style("background-color:#3f729b;color:#fff;");
        }
        });

        //patricia 0

        $table->column('busty1', __('Busty1'))->hide();
        $table->column('busty2', __('Busty2'))->hide();
        $table->column('waist', __('Waist'))->hide();
        $table->column('underbust', __('Underbust'))->hide();
        $table->column('shouldertowaist', __('Shouldertowaist'))->hide();
        $table->column('shouldertounder waist', __('Shouldertounder waist'))->hide();
        $table->column('shouldertonipple1', __('Shouldertonipple1'))->hide();
        $table->column('shouldertonipple2', __('Shouldertonipple2'))->hide();
        $table->column('shouldertoKnee', __('ShouldertoKnee'))->hide();
        $table->column('shouldertohip', __('Shouldertohip'))->hide();
        $table->column('waisttohip', __('Waisttohip'))->hide();
        $table->column('waisttoknee', __('Waisttoknee'))->hide();
        $table->column('waisttofloor', __('Waisttofloor'))->hide();
        $table->column('kneetofloor', __('Kneetofloor'))->hide();
        $table->column('nipppletonipple', __('Nipppletonipple'))->hide();
        $table->column('aroundarm', __('Aroundarm'))->hide();
        $table->column('sleeevelength', __('Sleeevelength'))->hide();
        $table->column('shortdress', __('Shortdress'))->hide();
        $table->column('longdress', __('Longdress'))->hide();
        $table->column('mididress', __('Mididress'))->hide();
        $table->column('blouselength', __('Blouselength'))->hide();
        $table->column('skirtlength', __('Skirtlength'))->hide();
        $table->column('slitlength', __('Slitlength'))->hide();
        $table->column('hip', __('Hip'))->hide();
        $table->column('fulllength', __('Fulllength'))->hide();
        $table->column('acrosschest', __('Acrosschest'))->hide();
        $table->column('acrossback', __('Acrossback'))->hide();
        $table->column('neck', __('Neck'))->hide();
        $table->column('offshoulder', __('Offshoulder'))->hide();
        $table->column('aroundknee', __('Aroundknee'))->hide();
        
        // $table->column('created_at', __('Created at'))->display(function($created_at){
        //     return date('m-d-Y',strtotime($created_at));
        // });

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
     * 
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Clients::findOrFail($id));

        //$show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('name', __('Fullname'));
        $show->field('adrress', __('Addrress'));
        $show->field('tel', __('Tel'));
        $show->field('date', __('Date'));
        $show->field('busty1', __('Busty'));
        $show->field('busty2', __('Busty'));
        $show->field('waist', __('Waist'));
        $show->field('underbust', __('Under bust'));
        $show->field('shouldertowaist', __('Shoulder to waist'));
        $show->field('shouldertounder waist', __('Shoulder to under waist'));
        $show->field('shouldertonipple1', __('Shoulder ton ipple'));
        $show->field('shouldertonipple2', __('Shoulder to nipple'));
        $show->field('shouldertoKnee', __('Shoulder to Knee'));
        $show->field('shouldertohip', __('Shoulder to hip'));
        $show->field('waisttohip', __('Waist to hip'));
        $show->field('waisttoknee', __('Waist to knee'));
        $show->field('waisttofloor', __('Waist to floor'));
        $show->field('kneetofloor', __('Knee to floor'));
        $show->field('nipppletonipple', __('Nippple to nipple'));
        $show->field('aroundarm', __('Around arm'));
        $show->field('sleeevelength', __('Sleeeve length'));
        $show->field('shortdress', __('Short dress'));
        $show->field('longdress', __('Long dress'));
        $show->field('mididress', __('Midi dress'));
        $show->field('blouselength', __('Blouse length'));
        $show->field('skirtlength', __('Skirt length'));
        $show->field('slitlength', __('Slit length'));
        $show->field('hip', __('Hip'));
        $show->field('fulllength', __('Full length'));
        $show->field('acrosschest', __('Across chest'));
        $show->field('acrossback', __('Across back'));
        $show->field('neck', __('Neck'));
        $show->field('offshoulder', __('Off shoulder'));
        $show->field('aroundknee', __('Around knee'));
        $show->field('status', __('Status'))->using(['0' => 'Processing..', '1' => 'Received..']);
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }


    public function show($id, Content $content)
    {
        $data = Dressblouseskirt::where('id',$id)->first();

        return $content->view('show',compact('data'));
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

        $form->hidden('measurement.measuretype')->value('DressBlouseSkirt');

        $form->text('name', __('FullName'))->rules('required');
        $form->textarea('adrress', __('Addrress'));
        $form->text('tel', __('Tel'))->icon('fa-phone')->rules('required|min:10');
        $form->image('image',__('Customer Image'));
        $form->date('measurement.date', __('Date'));
        $form->select('measurement.measurefor', __('Recording Measurement For'))
        ->options(['Dress' => 'Dress', 'Blouse' => 'Blouse', 'Skirt' => 'Skirt'])->rules('required');
        $form->text('measurement.busty1', __('Busty'));
        $form->text('measurement.busty2', __('Busty'));
        $form->text('measurement.waist', __('Waist'));
        $form->text('measurement.underbust', __('Under bust'));
        $form->text('measurement.shouldertowaist', __('Shoulder to waist'));
        $form->text('measurement.shouldertounderwaist', __('Shoulder to under  waist'));
        $form->text('measurement.shouldertonipple1', __('Shoulder to nipple'));
        $form->text('measurement.shouldertonipple2', __('Shoulder to nipple'));
        $form->text('measurement.shouldertoKnee', __('Shoulder to Knee'));
        $form->text('measurement.shouldertohip', __('Shoulder to hip'));
        $form->text('measurement.waisttohip', __('Waist to hip'));
        $form->text('measurement.waisttoknee', __('Waist to knee'));
        $form->text('measurement.waisttofloor', __('Waist to floor'));
        $form->text('measurement.kneetofloor', __('Kneet of loor'));
        $form->text('measurement.nipppletonipple', __('Nippple to nipple'));
        $form->text('measurement.aroundarm', __('Around arm'));
        $form->text('measurement.sleeevelength', __('Sleeeve length'));
        $form->text('measurement.shortdress', __('Short dress'));
        $form->text('measurement.longdress', __('Long dress'));
        $form->text('measurement.mididress', __('Midi dress'));
        $form->text('measurement.blouselength', __('Blouse length'));
        $form->text('measurement.skirtlength', __('Skirt length'));
        $form->text('measurement.slitlength', __('Slit length'));
        $form->text('measurement.hip', __('Hip'));
        $form->text('measurement.fulllength', __('Full length'));
        $form->text('measurement.acrosschest', __('Across chest'));
        $form->text('measurement.acrossback', __('Across back'));
        $form->text('measurement.neck', __('Neck'));
        $form->text('measurement.offshoulder', __('Off shoulder'));
        $form->text('measurement.aroundknee', __('Around knee'));
        //$form->number('status', __('Status'));

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
                'amountpaid' => $form->payment['amountpaid'],
                'amountleft' => $left,
                'reference' => 'Paying For '.$form->measurement['measurefor'],
                'pay_id' => $update->id
            ]);


            return Redirect()->to('/admin/transactions');
        }


        if ($form->isEditing()) {

            $left = $charge - $amountpaid;
            $update = Payment::where('cat_id',$id)->first();
            $update->amountleft = $left;
            $update->save();

            $tr = Transaction::where('pay_id',$update->id)->first();
            $tr->amountpaid = $form->payment['amountpaid'];
            $tr->amountleft = $left;
            $tr->reference = 'Paying For '.$form->measurement['measurefor'];
            $tr->save();

            return Redirect()->to('/admin/transactions');

        }


    });
        

        return $form;
    }


    public function transactioninfo(Content $content, $id)
    {
        $client = Dressblouseskirt::where('id',$id)->first();

        $tr = Transaction::where('cat_id',$id)->get();

        return $content->title('Transactions For '.$client->client->name)
        ->view('transaction',compact('tr','client'));
    }


    public function makepayment(Content $content, $id)
    {
       $client = Dressblouseskirt::where('id',$id)->first();

        return $content->title('Record Payment For '.$client->client->name)
        ->view('pay',compact('client'));
    }


    public function umakepayment(Content $content)
    {
        $client = Clients::latest()->limit(50)->get();

        return $content->title('Record Payment')
        ->view('pay-now',compact('client'));
    }


    public function checkdetails(Request $request)
    {
       $id = $request->get('clintname');

       $client = Dressblouseskirt::where('id',$id)->first();

        return view('show-details',compact('client'));

    }


    public function savepayment(Request $request)
    {
        $paynow = $request->post('paynow');
        $clientid = $request->post('clientid');
        $amountcharge = $request->post('amountcharge');
        $amntpaid = $request->post('amntpaid');
        $measurefor = $request->post('measurefor');

        $totalpaid = $amntpaid + $paynow;
        $totalleft = $amountcharge - $totalpaid;

        $update = Payment::where('cat_id',$clientid)->first();
        $update->amountpaid = $totalpaid;
        $update->amountleft = $totalleft;
        $update->save();

        Transaction::create([
            'cat_id' => $clientid,
            'amountpaid' => $paynow,
            'amountleft' => $totalleft,
            'reference' => 'Paying For '.$measurefor,
        ]);

        return "success";

        //return Redirect()->to('/admin/print-receipt/'.$clientid);

    }



    public function printreceipt(Content $content, $id)
    {
        $client = Dressblouseskirt::where('id',$id)->first();

        $tran = Transaction::where('cat_id',$id)->latest()->first();

        $servicecharge = Payment::where('cat_id',$id)->first();

        $owed = $client->payment->amountleft;

        if ($owed > 1) {

            $narration = 'Part Payment For service rendered ('.$client->measurefor.')';
        }else{

            $narration = 'Full Payment For service rendered ( '.$client->measurefor.')';
        }

        $f = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        $words = $f->format($tran->amountpaid ?? 0);



        return view('invoice',['tran' => $tran, 'words' => $words, 'ivoiceid' => $tran->id, 'narration' => $narration, 'receiptid' => $tran->id,'balance' => $owed,'client' => $client]);


        $fees = Pupilschoolfee::where('uniqueid', Admin::user()->uniqueid)->where('studentid',$idnumber)
        ->where('feecode',$feecode)->first();


        $owed = $fees->owed;

        if ($owed > 1) {
            $narration = __('Formfields.PartPaymentof').' '.$fees->schoolfee->title;
        }else{
            $narration = __('Formfields.FullPaymentof').' '.$fees->schoolfee->title;
        }

        $tran = Feetransaction::where('stdntid',$idnumber)
        ->where('feecode',$feecode)
        ->where('uniqueid', Admin::user()->uniqueid)
        ->whereDate('created_at', \Carbon\Carbon::today())
        ->latest()
        ->first();


  //dd($tran);

        if (!$tran) {
            return '<div class="alert alert-danger">'.Lang::get('Formfields.notpaidyet').' '.$fees->schoolfee->title.' '. Lang::get('Formfields.Today').'</div>';
        }

        $f = new \NumberFormatter(Config::get('app.locale'), \NumberFormatter::SPELLOUT);
        $words = $f->format($tran->amount ?? 0);

        $student = Studentinfo::where('uniqueid', Admin::user()->uniqueid)->where('student_id',$idnumber)->first();

        $fullname = $student->surname.' '.$student->firstname.''.$student->onames;

  //let insert it into the database
        $maxcode = Receipttrach::where('uniqueid', Admin::user()->uniqueid)->max('receptid');

        if ($maxcode) {
         $max = substr($maxcode, 3);
         $number = $max + 1;
         $code = "REF".$number;
     }else{
         $code = "REF100";
     }

     $data = [
      'trid' => $tran->id,
      'uniqueid' => Admin::user()->uniqueid,
      'receptid' => $code,
      'studentid' => $idnumber,
      'feecode' => $feecode,
      'amount' => $tran->amount,
      'receivedfrom' => $fullname,
  ];


  $check = Receipttrach::where('trid',$tran->id)
  ->where('studentid',$idnumber)->first();

  if (!$check) {
      $new = new Receipttrach($data);
      $new->save();

  }else{
      $new = Receipttrach::where('trid',$tran->id)
      ->where('studentid',$idnumber)->first();
  }




  return view('admin.accounts.invoice',['student' => $student,'tran' => $tran, 'words' => $words, 'ivoiceid' => $new->receptid, 'narration' => $narration, 'receiptid' => $new->id,'balance' => $owed]);
   //dd($trans);


}



public function backuprestoredatabase(Content $content)
{
    return $content->view('backup-restore');
}

public function backupdatabase()
{
    $simpleBackup = SimpleBackup::setDatabase([env('DB_DATABASE'),env('DB_USERNAME'), '', env('DB_HOST')])->storeAfterExportTo('D:\backup', 'backup'.date('m-d-Y'));


    admin_success('Database backup successful');

    return Redirect()->back();

    //secho $simpleBackup->getExportedName();
}





}
