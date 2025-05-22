<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class SectionSeeder extends AbstractSeed
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
                'name'   => 'Front Section',
                'price'      => 150000,
            ],
            [
                'name'   => 'Middle Section',
                'price'      => 75000,
            ],
            [
                'name'   => 'Balcony Section',
                'price'      => 35000,
            ],
            [
                'name'   => 'VIP BOX',
                'price'      => 350000,
            ],
        ];

        $sections = $this->table('sections');

        $sections->insert($data)->saveData();
    }
}
