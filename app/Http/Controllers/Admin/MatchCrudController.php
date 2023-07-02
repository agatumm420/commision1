<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MatchRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Match;
use App\Models\Team;
use App\Models\RozgrywkiW;
use App\Models\Sezon;


class MatchCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    public function setup()
    {
        $this->crud->setModel('App\Models\Match');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/match');
        $this->crud->setEntityNameStrings('match', 'matches');
    }

    protected function setupListOperation()
    {
        CRUD::column('match_date')->type('datetime')->label('Data');
        CRUD::column('score')->label('wynik');
        CRUD::column('team1_id')->label('Drużyna 1')->type('select')->entity('team1')->attribute('name');
        CRUD::column('team2_id')->label('Drużyna 2')->type('select')->entity('team2')->attribute('name');


//        CRUD::column('link');
        CRUD::column('rozgrywki_w_id')->label('Klasa')->type('select')->entity('rozgrywkiW')->attribute('nazwa_ro');
        CRUD::column('id_se')->label('Sezon')->type('select')->entity('sezon')->attribute('sezon_se');
        // assuming RozgrywkiW has a name attribute
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(MatchRequest::class);

        CRUD::field('match_date')->type('datetime')->label('Data');
        CRUD::field('score')->label('wynik');
        CRUD::field('team1_id')->label('Drużyna 1')->type('select2')->entity('team1')->attribute('name')->model(Team::class);
        CRUD::field('team2_id')->label('Drużyna 2')->type('select2')->entity('team2')->attribute('name')->model(Team::class);
        CRUD::field('link');
        CRUD::field('rozgrywki_w_id')->label('Klasa')->type('select2')->entity('rozgrywkiW')->attribute('nazwa_ro')->model(RozgrywkiW::class);
        CRUD::field('id_se')->label('Sezon')->type('select2')->entity('sezon')->attribute('sezon_se')->model(Sezon::class);

        // assuming RozgrywkiW has a name attribute
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
