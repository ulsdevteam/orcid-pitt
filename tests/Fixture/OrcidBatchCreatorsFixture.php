<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidBatchCreatorsFixture
 *
 */
class OrcidBatchCreatorsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92292".nextval', 'comment' => 'Row UUID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'NAME' => ['type' => 'string', 'length' => '8', 'null' => false, 'default' => null, 'comment' => 'A username granting access to create email batches.', 'precision' => null, 'fixed' => null, 'collate' => null],
        'FLAGS' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '0                ', 'comment' => 'A permissions bitmask.', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ORCID_BATCH_CREATORS_FLAGS' => ['type' => 'index', 'columns' => ['FLAGS'], 'length' => []],
        ],
        '_constraints' => [
            'ORCID_BATCH_CREATORS_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
            'ORCID_BATCH_CREATORS_NAME' => ['type' => 'unique', 'columns' => ['NAME'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'ID' => 1,
                'NAME' => 'Lorem ',
                'FLAGS' => 1
            ],
        ];
        parent::init();
    }
}
