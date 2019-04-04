<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidBatchesFixture
 *
 */
class OrcidBatchesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92286".nextval', 'comment' => 'Row UUID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'NAME' => ['type' => 'string', 'length' => '512', 'null' => false, 'default' => null, 'comment' => 'An administrative description of this email', 'precision' => null, 'fixed' => null, 'collate' => null],
        'SUBJECT' => ['type' => 'string', 'length' => '512', 'null' => false, 'default' => null, 'comment' => 'Subject line for the email', 'precision' => null, 'fixed' => null, 'collate' => null],
        'BODY' => ['type' => 'text', 'length' => '4000', 'null' => false, 'default' => null, 'comment' => 'Body content for the email', 'precision' => null, 'collate' => null],
        'FROM_NAME' => ['type' => 'string', 'length' => '64', 'null' => false, 'default' => null, 'comment' => 'From display name', 'precision' => null, 'fixed' => null, 'collate' => null],
        'FROM_ADDR' => ['type' => 'string', 'length' => '64', 'null' => false, 'default' => null, 'comment' => 'From email address', 'precision' => null, 'fixed' => null, 'collate' => null],
        'REPLY_TO' => ['type' => 'string', 'length' => '64', 'null' => true, 'default' => null, 'comment' => 'Reply to email address', 'precision' => null, 'fixed' => null, 'collate' => null],
        'ORCID_BATCH_CREATOR_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'ORCID Batch Creator Foreign Key', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ORCID_BATCHES_CREATOR_ID' => ['type' => 'index', 'columns' => ['ORCID_BATCH_CREATOR_ID'], 'length' => []],
        ],
        '_constraints' => [
            'ORCID_BATCHES_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
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
                'SUBJECT' => 'Lorem ipsum dolor sit amet',
                'BODY' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'FROM_NAME' => 'Lorem ipsum dolor sit amet',
                'FROM_ADDR' => 'Lorem ipsum dolor sit amet',
                'REPLY_TO' => 'Lorem ipsum dolor sit amet',
                'ORCID_BATCH_CREATOR_ID' => 1
            ],
        ];
        parent::init();
    }
}
