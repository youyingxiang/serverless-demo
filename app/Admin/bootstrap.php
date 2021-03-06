<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Grid;
use Dcat\Admin\Form;
use Dcat\Admin\Grid\Filter;
use Dcat\Admin\Show;

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Grid::resolving(function (Grid $grid) {
    $grid->setActionClass(\Dcat\Admin\Grid\Displayers\Actions::class);
    $grid->model()->orderBy('id', 'desc');
    $grid->disableViewButton();
    $grid->showQuickEditButton();
    $grid->enableDialogCreate();
    $grid->disableBatchDelete();
    $grid->actions(function (\Dcat\Admin\Grid\Displayers\Actions $actions) {
        $actions->disableView();
        $actions->disableDelete();
        $actions->disableEdit();
    });
    $grid->option('dialog_form_area', ['70%', '80%']);
});
app('view')->prependNamespace('admin', resource_path('views/vendor/dcat-admin'));
