<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User2Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class User2CrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class User2CrudController extends CrudController
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
        CRUD::setModel(\App\Models\User2::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user2');
        CRUD::setEntityNameStrings('user2', 'user2s');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('login')
            ->label('Login')
            ->type('text');
        CRUD::column('km')
            ->label('Kilometers')
            ->type('number');

        CRUD::column('email')
            ->label('Email')
            ->type('email');

        CRUD::column('aktwn_u')
            ->label('Active')
            ->type('boolean');

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
        CRUD::setValidation(User2Request::class);

        CRUD::field('login')
            ->label('Login')
            ->type('text')
            ->rules(['required', 'string', 'max:255']);

        CRUD::field('password')
            ->label('Password')
            ->type('password')
            ->rules(['required', 'string', 'min:8']);

        CRUD::field('km')
            ->label('Kilometers')
            ->type('number')
            ->rules(['required', 'integer']);

        CRUD::field('email')
            ->label('Email')
            ->type('email')
            ->rules(['required', 'string', 'email', 'max:255', 'unique:user2,email']);

        CRUD::field('aktwn_u')
            ->label('Active')
            ->type('checkbox')
            ->rules(['required', 'boolean']);

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
