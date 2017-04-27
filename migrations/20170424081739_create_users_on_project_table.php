<?php
/**
 * Created by PhpStorm for my_nette_project.
 * User: Zuzana Benickova
 * Date:
 * Time:
 */

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateUsersOnProjectTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */

    private $tableName = "users_on_projects";
    public function up()
    {
        $users_on_projects = $this->table($this->tableName); // id je automaticky generován
        $users_on_projects
            ->addColumn('id_user', 'integer')
            //->addForeignKey('id_user', 'users', 'id', array('delete'=> 'SET_NULL', 'update'=> 'CASCADE'))
            ->addColumn('id_project', 'integer')
            //->addForeignKey('id_project', 'projects', 'id', array('delete'=> 'SET_NULL', 'update'=> 'CASCADE'))
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime')
            ->addColumn('enabled', 'boolean', array('default' => true))
            ->save();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}