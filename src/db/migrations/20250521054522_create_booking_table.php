<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateBookingTable extends AbstractMigration
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
        $table = $this->table('bookings');
        $table
            ->addColumn('guest_id', 'integer', ['limit' => 11, 'signed' => false])
            ->addColumn('session_id', 'integer', ['limit' => 11, 'signed' => false])
            ->addColumn('seat_id', 'integer', ['limit' => 11, 'signed' => false])
            ->addColumn('ticket_number', 'string', ['limit' => 40])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated', 'timestamp', ['null' => true])
            ->addColumn('is_deleted', 'boolean', ['default' => 0])
            ->addColumn('user_id', 'integer', ['limit' => 11, 'signed' => false, 'null' => true])
            ->addIndex(['ticket_number'], ['unique' => true])
            ->addForeignKey('guest_id', 'guests', 'id', ['constraint' => 'booking_guest_fk'])
            ->addForeignKey('session_id', 'sessions', 'id', ['constraint' => 'booking_session_fk'])
            ->addForeignKey('seat_id', 'seats', 'id', ['constraint' => 'booking_seat_fk'])
            ->addForeignKey('user_id', 'users', 'id', ['constraint' => 'booking_user_fk'])
            ->create();
    }
}
