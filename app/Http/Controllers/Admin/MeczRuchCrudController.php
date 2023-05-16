<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeczRuchRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MeczRuchCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MeczRuchCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MeczRuch::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mecz-ruch');
        CRUD::setEntityNameStrings('mecz ruchu', 'mecze ruchu');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('data_mr');
        CRUD::column('wynik_mr');
        CRUD::column('km_mr');

        // For foreign keys, it's better to show related entities' attributes instead of their IDs
        CRUD::column('sezon.sezon_se')->label('Sezon'); // assuming 'sezon_se' is a meaningful attribute in Sezon model
        CRUD::column('druzyna.nazwa_dr')->label('Druzyna'); // assuming 'nazwa_dr' is a meaningful attribute in Druzyna model
        CRUD::column('rozgrywkiW.nazwa_ro')->label('Rozgrywki'); // assuming 'nazwa_ro' is a meaningful attribute in RozgrywkiW model


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MeczRuchRequest::class);

        CRUD::field('data_mr')->type('datetime');
        CRUD::field('wynik_mr')->type('text');
        CRUD::field('km_mr')->type('number');

        // For 'id_se' field
        CRUD::field('id_se')
            ->type('select')
            ->label('Sezon')
            ->entity('sezon') // the method that defines the relationship in your Model
            ->model('App\Models\Sezon') // related model
            ->attribute('sezon_se'); // foreign key attribute that is shown to user

// For 'id_dr' field
        CRUD::field('id_dr')
            ->type('select')
            ->label('Druzyna')
            ->entity('druzyna') // the method that defines the relationship in your Model
            ->model('App\Models\Druzyna') // related model
            ->attribute('nazwa_dr'); // foreign key attribute that is shown to user

// For 'id_ro' field
        CRUD::field('id_ro')
            ->type('select')
            ->label('Rozgrywki')
            ->entity('rozgrywkiW') // the method that defines the relationship in your Model
            ->model('App\Models\RozgrywkiW') // related model
            ->attribute('nazwa_ro');
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
