<?php

namespace App\Admin\Controllers;

use App\Models\Grouts;
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
    protected $title = 'Grouts';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */



    protected function grid()
    {
        $grid = new Grid(new Grouts());

        $grid->column('id', __('Id'));
        $grid->column('article', __('ЛМ код'))->filter('like');
        $grid->column('name', __('Наименование'));
        $grid->column('color', __('Цвет'));
        $grid->column('plant', __('Производитель'));
        $grid->column('show')->switch();

        // set text, color, and stored values
        $states = [
            'on' => ['value' => 1, 'text' => 'open', 'color' => 'primary'],
            'off' => ['value' => 2, 'text' => 'close', 'color' => 'default'],
        ];

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));



        $grid->filter(function ($filter) {

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('article', 'LM код');
            $filter->like('name', 'Наименование');
        });

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
        $show = new Show(Grouts::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('article', __('Article'));
        $show->field('name', __('Name'));
        $show->field('color', __('Color'));
        $show->field('plant', __('Производитель'));
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
        $form = new Form(new Grouts());

        $form->number('article', __('Article'));
        $form->text('name', __('Name'));
        $form->text('color', __('Color'));
        $form->switch('show', __('Show'))->default(1);

        return $form;
    }
}
