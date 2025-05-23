<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'username'   => 'admin',
                'email'      => 'admin@example.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            ],
            [
                'username'   => 'brian',
                'email'      => 'brian@example.com',
                'password'   => password_hash('brian123', PASSWORD_DEFAULT),
            ],
        ];

        $users = $this->table('users');

        $users->insert($data)->saveData();
    }
}
