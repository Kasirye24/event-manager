<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSectionsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('sections');
        $table->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('price', 'double', ['precision' => 10, 'scale' => 2])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'timestamp', ['null' => true])
            ->addColumn('is_deleted', 'boolean', ['default' => 0])
            ->addIndex(['name'], ['unique' => true])
            ->create();
    }
}
