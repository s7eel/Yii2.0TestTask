<?php

use yii\db\Migration;

/**
 * Handles the creation of table `discount`.
 */
class m170611_222457_create_discount_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('discount', [
            'id' => $this->primaryKey(),
            'discount' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('discount');
    }
}
