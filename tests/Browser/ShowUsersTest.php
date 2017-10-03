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
                ->visit(route('users.index'))
                ->assertSee($firstUser->name)
                ->assertDontSee($lastUser->name)
                ->clickLink('2')
                ->assertSee($lastUser->name)
                ->assertDontSee($firstUser->name);
        });
    }

    public function test_find_users_form()
    {
        //having
        $defaultUser = $this->defaultUser([
            'role' => 'admin'
        ]);
        factory(User::class,15)->create();

        $userToSearch = factory(User::class)->create([
            'name' => 'Sebastian Vasquez',
            'created_at' => Carbon::now()
        ]);
        //when
        $this->browse(function (Browser $browser) use($userToSearch,$defaultUser) {
            $browser->loginAs($defaultUser)
                ->visit(route('users.index'))
                ->assertDontSee('Sebastian Vasquez')
                ->type('search','Sebastian Vasquez')
                ->press('Submit');
        //then
            $browser->assertSee('Sebastian Vasquez');
        });
    }
}
