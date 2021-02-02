<?php

namespace App\Admin\Controllers;

use App\Models\products;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new products());

        $grid->column('id', __('Id'));
        $grid->column('article', __('Article'));
        $grid->column('name', __('Name'));
        $grid->column('EAN', __('EAN'));
        $grid->column('plant_id', __('Plant id'));
        $grid->column('plant_name', __('Plant name'));
        $grid->column('product_id', __('Product id'));
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
        $show = new Show(products::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('article', __('Article'));
        $show->field('name', __('Name'));
        $show->field('EAN', __('EAN'));
        $show->field('plant_id', __('Plant id'));
        $show->field('plant_name', __('Plant name'));
        $show->field('product_id', __('Product id'));
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
        $form = new Form(new products());

        $form->number('article', __('Article'));
        $form->text('name', __('Name'));
        $form->number('EAN', __('EAN'));
        $form->number('plant_id', __('Plant id'));
        $form->text('plant_name', __('Plant name'));
        $form->number('product_id', __('Product id'));

        return $form;
    }
}
