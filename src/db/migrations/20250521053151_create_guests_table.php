<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateGuestsTable extends AbstractMigration
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
        $table = $this->table('guests');
        $table->addColumn('full_name', 'string', ['limit' => 255])
            ->addColumn('email', 'string', ['limit' => 255])
            ->addColumn('phone', 'string', ['limit' => 13])
            ->addColumn('organization', 'string', ['null' => true])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'timestamp', ['null' => true])
            ->addColumn('is_deleted', 'boolean', ['default' => 0])
            ->addIndex(['phone', 'email'], ['unique' => true])
            ->create();
    }
}
