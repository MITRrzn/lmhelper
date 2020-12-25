<?php

namespace App\Admin\Controllers;

use App\Models\Grout;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GroutController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Grout';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Grout());

        

        $grid->column('id', __('Id'));
        $grid->column('article', __('Article'));
        $grid->column('name', __('Name'));
        $grid->column('color', __('Color'));
        $grid->column('img_pth', __('Img pth'));
        // $grid->column('show', __('Show'));
        
        $grid->column('show')->switch();

        // set text, color, and stored values
        // $states = [
        //     'on' => ['value' => 1, 'text' => 'open', 'color' => 'primary'],
        //     'off' => ['value' => 2, 'text' => 'close', 'color' => 'default'],
        // ];
        // $grid->column('show')->switch($states);

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
        $show = new Show(Grout::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('article', __('Article'));
        $show->field('name', __('Name'));
        $show->field('color', __('Color'));
        $show->field('img_pth', __('Img pth'));
        $show->field('show', __('Show'));
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
        $form = new Form(new Grout());

        $form->number('article', __('Article'));
        $form->text('name', __('Name'));
        $form->text('color', __('Color'));
        $form->url('img_pth', __('Img pth'));
        $form->switch('show', __('Show'));

        return $form;
    }
}
