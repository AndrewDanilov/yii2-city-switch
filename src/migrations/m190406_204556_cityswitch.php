<?php

use yii\db\Migration;

/**
 * Class m190406_204556_cityswitch
 */
class m190406_204556_cityswitch extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $tableOptions = null;
	    if ($this->db->driverName === 'mysql') {
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	    }

	    $this->createTable('cityswitch', [
	    	'id' => $this->primaryKey(),
		    'city' => $this->string()->unique(),
		    'city_name' => $this->string(),
		    'data' => $this->text(),
		    'order' => $this->integer()->notNull()->defaultValue(0),
	    ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cityswitch');

        return true;
    }
}
