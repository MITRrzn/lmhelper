<?php

namespace App\Admin\Controllers;

use App\Models\orders;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new orders());

        $grid->column('id', __('Id'));
        $grid->column('customer_name', __('Клиент'));
        $grid->column('customer_phone', __('Телефон'));
        $grid->column('shipment_num', __('Shipment num'));
        $grid->column('status', __('Статус'));
        $grid->column('inner_order', __('Inner order'));
        $grid->column('departmentID', __('Отдел'));
        $grid->column('note', __('Заметки'));
        $grid->column('is_show')->switch();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(orders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('customer_name', __('Покупатель'));
        $show->field('customer_phone', __('Customer phone'));
        $show->field('shipment_num', __('Shipment num'));
        $show->field('status', __('Status'));
        $show->field('inner_order', __('Inner order'));
        $show->field('departmentID', __('departmentID'));
        $show->field('note', __('Note'));
        $show->field('is_show', __('Show'));
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
        $form = new Form(new orders());

        $form->text('customer_name', __('Клиент'));
        $form->number('customer_phone', __('Телефон'));
        $form->number('shipment_num', __('Shipment num'));
        $form->text('status', __('Статус'));
        $form->number('inner_order', __('Inner order'));
        $form->number('departmentID', __('Отдел'));
        $form->textarea('note', __('Заметки'));
        $form->switch('is_show', __('Show'))->default(1);

        return $form;
    }
}
