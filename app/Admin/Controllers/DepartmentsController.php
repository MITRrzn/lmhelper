<?php

namespace App\Admin\Controllers;

use App\Models\departments;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DepartmentsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'departments';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new departments());

        $grid->column('id', __('Id'));
        $grid->column('department_number', __('Department number'));
        $grid->column('name', __('Name'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(departments::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('department_number', __('Department number'));
        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new departments());

        $form->number('department_number', __('Department number'));
        $form->text('name', __('Name'));

        return $form;
    }
}
