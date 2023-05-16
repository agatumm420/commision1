<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MeczWidzewRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MeczWidzewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MeczWidzewCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MeczWidzew::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mecz-widzew');
        CRUD::setEntityNameStrings('mecz widzewa', 'mecze widzewa');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('data_mw')->type('datetime')->label('Data Meczu');
        CRUD::column('wynik_mw')->type('text')->label('Wynik');

        CRUD::column('km_mw')->type('number')->label('Kilometry');


        CRUD::column('sezon.sezon_se')->label('Sezon');
        CRUD::column('druzyna.nazwa_dr')->label('Druzyna');
        CRUD::column('rozgrywkiW.nazwa_ro')->label('Rozgrywki');

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
        CRUD::setValidation(MeczWidzewRequest::class);

        CRUD::field('data_mw')->type('datetime');
        CRUD::field('wynik_mw')->type('text');
        CRUD::field('km_mw')->type('number');


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
            ->attribute('nazwa_ro'); // foreign key attribute that is shown to user


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
