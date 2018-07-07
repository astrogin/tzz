<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Form\Buttons\Delete;
use SleepingOwl\Admin\Form\Buttons\Save;

/**
 * Class Record
 *
 * @property \App\Record $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Record extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $table = AdminDisplay::datatablesAsync()->with('firstProp', 'secondProp', 'thirdProp')->setDisplaySearch(true);
        $table->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', 'Id'),
                AdminColumn::text('property_1', 'Prop 1'),
                AdminColumn::text('property_2', 'Prop 2'),
                AdminColumn::text('property_3', 'Prop 3'),
                AdminColumn::text('property_4', 'Prop 4'),
                AdminColumn::text('property_5', 'Prop 5'),
                AdminColumn::text('property_6', 'Prop 6'),
                AdminColumn::text('property_7', 'Prop 7'),
                AdminColumn::lists('firstProp.property_8', 'Prop 8'),
                AdminColumn::lists('secondProp.property_9', 'Prop 9'),
                AdminColumn::lists('thirdProp.property_10', 'Prop 10')
            )->paginate(20);

        return $table;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::panel();
        $form->addBody(array(
            AdminFormElement::text('property_1', 'Prop 1')->required()->addValidationRule('max:255'),
            AdminFormElement::text('property_2', 'Prop 2')->required()->addValidationRule('max:255'),
            AdminFormElement::text('property_3', 'Prop 3')->required()->addValidationRule('max:255'),
            AdminFormElement::text('property_4', 'Prop 4')->required()->addValidationRule('max:255'),
            AdminFormElement::text('property_5', 'Prop 5')->required()->addValidationRule('max:255'),
            AdminFormElement::text('property_6', 'Prop 6')->required()->addValidationRule('max:255'),
            AdminFormElement::text('property_7', 'Prop 7')->required()->addValidationRule('max:255')
        ));
        $form->getButtons()->replaceButtons([
            'delete' => (new Delete())->setText('Delete'),
            'save' => (new Save())->setText('Save changes'),
            'cancel' => null,
        ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
