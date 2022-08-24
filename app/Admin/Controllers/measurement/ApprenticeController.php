<?php

namespace App\Admin\Controllers\measurement;

use App\Admin\Actions\Appstatusupdate;
use App\Models\Apprentice;
use App\Models\Dressblouseskirt;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class ApprenticeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Apprentice';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Dressblouseskirt());
        $table->model()->where('measuretype','Apprentice');
        
        $table->column('id', __('Id'));
        $table->column('image', __('Image'))->display(function($pic){
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
        $table->column('fullname', __('Fullname'));
        $table->column('gender', __('Gender'));
        $table->column('addrress', __('Addrress'));
        $table->column('tel', __('Tel'));
        $table->column('dateofbirth', __('BOB'));
        $table->column('age', __('Age'));
        $table->column('duration', __('Duration'));
        $table->column('ustatus', __('Status'))->display(function(){

            if ($this->status == '0') {
                return '<label class="badge badge-danger">Stopped</label>';
            }

            if ($this->status == '1') {
                return '<label class="badge badge-info">Active</label>';
            }

            if ($this->status == '2') {
                return '<label class="badge badge-success">Graduated</label>';
            }
        });

        $table->column('levelofeducation', __('Levelofeducation'))->hide();
        $table->column('contactpersons', __('Contactpersons'))->hide();
        $table->column('contactrelations', __('Contactrelations'))->hide();
        $table->column('contactnumber', __('Contactnumber'))->hide();
        $table->column('status', __('Status'));
        $table->column('created_at', __('Created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        $table->column('updated_at', __('Updated at'))->hide();

        $table->column('status', __('status'))->hide();

        $table->rows(function ($row) {
         if ($row->column('status') == '0' ) {
            $row->style("background-color:#dc3545;color:#fff;");
         }

         if ($row->column('status') == '2' ) {
            $row->style("background-color:#042456;color:#fff;");
         }
        });

        $table->filter(function($filter){

            $filter->disableIdFilter();

           // $filter->expand();

            $filter->equal('fullname',__('Search Name'))->select(Apprentice::select('fullname','id')->distinct()->pluck('fullname','fullname'));

            $filter->equal('tel',__('Phone'));

        });

        $table->actions(function($actions){
            $actions->add(new Appstatusupdate());
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

       // $show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('fullname', __('Fullname'));
        $show->field('gender', __('Gender'));
        $show->field('addrress', __('Addrress'));
        $show->field('tel', __('Tel'));
        $show->field('dateofbirth', __('BOB'));
        $show->field('age', __('Age'));
        $show->field('duration', __('Duration'));
        $show->field('levelofeducation', __('Level of education'));
        $show->field('contactpersons', __('Contact persons'));
        $show->field('contactrelations', __('Relations'));
        $show->field('contactnumber', __('Contact persons number'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Dressblouseskirt());
        $form->hidden('measuretype')->value('Apprentice');
        $form->image('image', __('Image'));
        $form->text('fullname', __('Fullname'))->rules('required');
        $form->select('gender', __('Gender'))->options(['Male' => 'Male', 'Female' => 'Female'])->rules('required');
        $form->textarea('addrress', __('Addrress'));
        $form->text('tel', __('Tel'))->rules('required|min:10');
        $form->date('dateofbirth', __('BOB'));
        $form->hidden('age', __('Age'));
        $form->text('duration', __('Duration'));
        $form->text('levelofeducation', __('Levelofeducation'));
        $form->text('contactpersons', __('Contactpersons'));
        $form->select('contactrelations', __('Relations'))
        ->options(['Mother' => 'Mother', 'Father' => 'Father', 'Uncle' => 'Uncle', 'Aunt' => 'Aunt', 'Brother' => 'Brother', 'Sister' => 'Sister']);
        $form->text('contactnumber', __('Contact persons number'))->rules('required|min:10');

        $form->saving(function($form){
            $date = date('Y',strtotime($form->dateofbirth));
            $currentyear = date('Y');
            $form->age = $currentyear - $date;
        });

        return $form;
    }
}
