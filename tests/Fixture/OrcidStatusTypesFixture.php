<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidStatusTypesFixture
 *
 */
class OrcidStatusTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92274".nextval', 'comment' => 'Row UUID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'NAME' => ['type' => 'string', 'length' => '512', 'null' => false, 'default' => null, 'comment' => 'A description of the event', 'precision' => null, 'fixed' => null, 'collate' => null],
        'SEQ' => ['type' => 'integer', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'The order in which this event logically falls', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'ORCID_STATUS_TYPES_SEQ' => ['type' => 'unique', 'columns' => ['SEQ'], 'length' => []],
            'ORCID_STATUS_TYPES_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
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
                'NAME' => 'Lorem ipsum dolor sit amet',
                'SEQ' => 1
            ],
        ];
        parent::init();
    }
}
