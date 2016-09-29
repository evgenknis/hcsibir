<?php

use yii\db\Migration;
use yii\db\Schema;

class m160923_062542_create_calendar_events_table extends Migration
{
    public function up()
    {
          $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
 
          $this->createTable('{{%calendar_events}}', [
              'id' => Schema::TYPE_PK,
              'date' => Schema::TYPE_DATE . ' NOT NULL',
	      'start_time' => Schema::TYPE_TIME . ' NOT NULL',
	      'end_time' => Schema::TYPE_TIME . ' NOT NULL',
              'name' => Schema::TYPE_STRING . '(200) NOT NULL',
              'groups' => Schema::TYPE_INTEGER . ' NOT NULL',
              'place' => Schema::TYPE_INTEGER . ' NOT NULL',
          ], $tableOptions);
      }
 
 
    public function down()
    {
      $this->dropTable('{{%calendar_events}}');
    }
}
