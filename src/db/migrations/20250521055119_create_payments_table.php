<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePaymentsTable extends AbstractMigration
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
    public function change()
    {
        $table = $this->table('payments');
        $table
            ->addColumn('booking_id', 'integer', ['limit' => 11, 'signed' => false])
            ->addColumn('reference_number', 'string', ['limit' => 255])
            ->addColumn('amount', 'double', ['precision' => 10, 'scale' => 2])
            ->addColumn('payment_method', 'string', ['limit' => 255])
            ->addColumn('status', 'enum', ['values' => ['pending', 'failed', 'success'], 'default' => 'pending'])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'timestamp', ['null' => true])
            ->addColumn('is_deleted', 'boolean', ['default' => 0])
            ->addForeignKey('booking_id', 'guests', 'id', ['constraint' => 'payment_booking_fk'])
            ->create();
    }
}
