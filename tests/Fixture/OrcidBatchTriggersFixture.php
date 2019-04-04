<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidBatchTriggersFixture
 *
 */
class OrcidBatchTriggersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92297".nextval', 'comment' => 'Row UUID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'NAME' => ['type' => 'string', 'length' => '512', 'null' => false, 'default' => null, 'comment' => 'A description of this triggering event', 'precision' => null, 'fixed' => null, 'collate' => null],
        'ORCID_STATUS_TYPE_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The current status event which will trigger the email for the user', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ORCID_BATCH_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The email batch that will be associated with this email contact', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'TRIGGER_DELAY' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The number of days which must pass before this event is triggered', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ORCID_BATCH_GROUP_ID' => ['type' => 'integer', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ORCID Batch Group Foreign Key', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'BEGIN_DATE' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'The first date this trigger may occur', 'precision' => null],
        'REQUIRE_BATCH_ID' => ['type' => 'integer', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Is a prior email from this system required?', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'REPEAT' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '0                       ', 'comment' => 'If nonzero, the number of days which must pass before this event is retriggered', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'MAXIMUM_REPEAT' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '0 ', 'comment' => 'If nonzero, the number of times this batch email may be sent before this trigger condition is met', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ORCID_BATCH_TRIGGERS_EVENT_ID' => ['type' => 'index', 'columns' => ['ORCID_STATUS_TYPE_ID'], 'length' => []],
            'ORCID_BATCH_TRIGGERS_BEG_DATE' => ['type' => 'index', 'columns' => ['BEGIN_DATE'], 'length' => []],
            'ORCID_BATCH_TRIGGERS_GROUP_ID' => ['type' => 'index', 'columns' => ['ORCID_BATCH_GROUP_ID'], 'length' => []],
            'ORCID_BATCH_TRIGGERS_BATCH_ID' => ['type' => 'index', 'columns' => ['ORCID_BATCH_ID'], 'length' => []],
        ],
        '_constraints' => [
            'ORCID_BATCH_TRIGGERS_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
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
                'ORCID_STATUS_TYPE_ID' => 1,
                'ORCID_BATCH_ID' => 1,
                'TRIGGER_DELAY' => 1,
                'ORCID_BATCH_GROUP_ID' => 1,
                'BEGIN_DATE' => '2019-03-18 15:16:03',
                'REQUIRE_BATCH_ID' => 1,
                'REPEAT' => 1,
                'MAXIMUM_REPEAT' => 1
            ],
        ];
        parent::init();
    }
}
