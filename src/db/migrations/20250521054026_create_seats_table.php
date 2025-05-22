<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSeatsTable extends AbstractMigration
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
        $table = $this->table('seats');
        $table
            ->addColumn('section_id', 'integer', ['limit' => 11, 'signed' => false])
            ->addColumn('seat_number', 'string', ['limit' => 255])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'timestamp', ['null' => true])
            ->addColumn('is_deleted', 'boolean', ['default' => 0])
            ->addIndex(['seat_number'], ['unique' => true])
            ->addForeignKey('section_id', 'sections', 'id', ['constraint' => 'section_seat_fk'])
            ->create();
    }
}
