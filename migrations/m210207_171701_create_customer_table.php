<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m210207_171701_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->null(),
            'birth_date' => $this->date(),
            'gender' => $this->integer()->defaultValue(1),
            'p_number' => $this->string(32)->null(),
            'phone' => $this->string(32)->null(),
            'experience' => $this->integer()->null(),
            'start_time' => $this->date()->null(),
            'address' => $this->string(32)->null(),
            'user_id' => $this->integer()->unsigned()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx-customer-user_id', 'customer', 'user_id');
        $this->addForeignKey('fk-customer-user_id', 'customer', 'user_id', 'user', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-customer-user_id', 'customer');
        $this->dropIndex('idx-customer-user_id', 'customer');

        $this->dropTable('{{%customer}}');
    }
}
