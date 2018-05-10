<?php

namespace console\migrations;

use yii\db\Migration;

/**
 * Class M180225104852Dictionaries
 */
class M180225104852Dictionaries extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%nationalities}}', ['name'], [
            ['British'],
            ['English'],
            ['Irish'],
            ['Scottish'],
        ]);
        $this->batchInsert('{{%nutrition}}', ['name'], [
            ['Dairy Free'],
            ['Food cut up'],
            ['Fortified drinks'],
            ['Gluten Free'],
            ['Halal'],
            ['High Fibre'],
            ['Kosher'],
            ['Low salt'],
            ['Normal'],
            ['PEG feed'],
            ['Pureed'],
            ['Soft'],
            ['Thickening fluids'],
            ['Vegan'],
            ['Wheat Free'],
        ]);
        $this->batchInsert('{{%nutritional_diagnosis}}', ['name'], [
            ['Allergy'],
            ['Anaemia'],
            ['Celiac'],
            ['Constipation'],
            ['Diabetic'],
            ['High Blood Pressure'],
            ['High Cholestorol'],
            ['IBS'],
            ['Low Blood Pressure'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%nationalities}}');
        $this->truncateTable('{{%nutrition}}');
        $this->truncateTable('{{%nutrition_diagnosis}}');
    }
}
