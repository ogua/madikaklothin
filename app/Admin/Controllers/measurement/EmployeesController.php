<?php

namespace App\Admin\Controllers\measurement;

use App\Admin\Actions\Empstatusupdate;
use App\Models\Employees;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class EmployeesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Employees';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table()
    {
        $table = new Table(new Employees());

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
        $table->column('dateofbirth', __('DOB'));
        $table->column('age', __('Age'));
        $table->column('ustatus', __('Status'))->display(function(){

            if ($this->status == '0') {
                return '<label class="badge badge-info">Stopped</label>';
            }

            if ($this->status == '1') {
                return '<label class="badge badge-success">Active</label>';
            }
        });

        $table->column('levelofeducation', __('Level of education'))->hide();
        $table->column('contactpersons', __('Contact persons'))->hide();
        $table->column('contactrelations', __('Contact relations'))->hide();
        $table->column('contactnumber', __('Contact number'))->hide();
       $table->column('created_at', __('Created at'))->display(function($created_at){
            return date('m-d-Y',strtotime($created_at));
        });
        //$table->column('updated_at', __('Updated at'));

       $table->column('status', __('status'))->hide();

        $table->rows(function ($row) {
         if ($row->column('status') == '0' ) {
            $row->style("background-color:#dc3545;color:#fff;");
        }
        });

       $table->filter(function($filter){

            $filter->disableIdFilter();

           // $filter->expand();

            $filter->equal('fullname',__('Search Name'))->select(Employees::select('fullname','id')->distinct()->pluck('fullname','fullname'));

            $filter->equal('tel',__('Phone'));

        });


        $table->actions(function($actions){
            $actions->add(new Empstatusupdate());
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
        $show = new Show(Employees::findOrFail($id));

        //$show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('fullname', __('Fullname'));
        $show->field('gender', __('Gender'));
        $show->field('addrress', __('Addrress'));
        $show->field('tel', __('Tel'));
        $show->field('dateofbirth', __('DOB'));
        $show->field('age', __('Age'));
        $show->field('levelofeducation', __('Level of education'));
        $show->field('contactpersons', __('Contact persons'));
        $show->field('contactrelations', __('Relations'));
        $show->field('contactnumber', __('Contact persons number'));
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
        $form = new Form(new Employees());

        $form->image('image', __('Image'))->removable();
        $form->text('fullname', __('Fullname'))->rules('required');
        $form->select('gender', __('Gender'))->options(['Male' => 'Male', 'Female' => 'Female'])->rules('required');
        $form->textarea('addrress', __('Addrress'));
        $form->text('addrress', __('Addrress'));
        $form->text('tel', __('Tel'))->rules('required|min:10');
        $form->date('dateofbirth', __('BOB'));
        $form->hidden('age', __('Age'));
        $form->text('levelofeducation', __('Level of education'));
        $form->text('contactpersons', __('Contact persons'));
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
