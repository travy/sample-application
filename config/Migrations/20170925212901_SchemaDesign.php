<?php
use Migrations\AbstractMigration;

class SchemaDesign extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $searches = $this->table('searches');
        $searches
                ->addColumn('term', 'string', ['length' => 100])
                ->addColumn('results', 'integer')
                ->addColumn('created', 'datetime')
                ->addColumn('modified', 'datetime')
                ->create();
    }
}
