<?php

namespace Tests\Browser;

use App\User;
use Carbon\Carbon;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowUsersTest extends DuskTestCase
{
 use DatabaseMigrations;

    public function test_listing_users()
    {
        $defaultUser = $this->defaultUser([
            'role' => 'admin'
        ]);

        $firstUser = factory(User::class)->create([
            'name' => 'Faustino Vasquez',
            'created_at' => Carbon::now()->subDay(2)
        ]);

        factory(User::class,15)->create();

        $lastUser = factory(User::class)->create([
            'name' => 'Sebastian Vasquez',
            'created_at' => Carbon::now()
        ]);


        $this->browse(function (Browser $browser) use($firstUser,$lastUser,$defaultUser) {
            $browser->loginAs($defaultUser)
                ->visit(route('users.show'))
                ->assertSee($firstUser->name)
                ->assertDontSee($lastUser->name)
                ->clickLink('2')
                ->assertSee($lastUser->name)
                ->assertDontSee($firstUser->name);
        });
    }
}
