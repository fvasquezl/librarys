<?php

namespace Tests;

use App\Book;
use App\User;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    protected $defaultUser;
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @return mixed
     */
    public function defaultUser(array $attributes =[])
    {
        if($this->defaultUser){
            return $this->defaultUser;
        }
        return factory(User::class)->create($attributes);
    }

    public function createBook(array $attributes =[])
    {
        return factory(Book::class)->create($attributes);
    }
}
