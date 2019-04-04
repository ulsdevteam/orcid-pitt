<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidStatusesFixture
 *
 */
class OrcidStatusesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92268".nextval', 'comment' => 'Row UUID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ORCID_USER_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The user to whom this event applies', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ORCID_STATUS_TYPE_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The type of event being recorded', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'STATUS_TIMESTAMP' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'When this status change occured', 'precision' => null],
        '_indexes' => [
            'ORCID_STATUSES_USER_ID' => ['type' => 'index', 'columns' => ['ORCID_USER_ID'], 'length' => []],
            'ORCID_STATUSES_STATUS_TYPE_ID' => ['type' => 'index', 'columns' => ['ORCID_STATUS_TYPE_ID'], 'length' => []],
        ],
        '_constraints' => [
            'ORCID_STATUSES_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
            'ORCID_STATUSES_USERSTATUS' => ['type' => 'unique', 'columns' => ['ORCID_USER_ID', 'ORCID_STATUS_TYPE_ID'], 'length' => []],
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
                'ORCID_USER_ID' => 1,
                'ORCID_STATUS_TYPE_ID' => 1,
                'STATUS_TIMESTAMP' => '2019-03-18 15:16:26'
            ],
        ];
        parent::init();
    }
}
