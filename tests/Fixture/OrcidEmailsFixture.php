<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidEmailsFixture
 *
 */
class OrcidEmailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92278".nextval', 'comment' => 'The user to whom the email is sent', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ORCID_USER_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The user to whom the email is sent', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'ORCID_BATCH_ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'The batch which was queued to the user', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'QUEUED' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'When the email was scheduled', 'precision' => null],
        'SENT' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'When the email was processed', 'precision' => null],
        'CANCELLED' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'When the email was cancelled', 'precision' => null],
        '_indexes' => [
            'ORCID_EMAILS_USER_ID' => ['type' => 'index', 'columns' => ['ORCID_USER_ID'], 'length' => []],
            'ORCID_EMAILS_CANCELLED' => ['type' => 'index', 'columns' => ['CANCELLED'], 'length' => []],
            'ORCID_EMAILS_QUEUED' => ['type' => 'index', 'columns' => ['QUEUED'], 'length' => []],
            'ORCID_EMAILS_SENT' => ['type' => 'index', 'columns' => ['SENT'], 'length' => []],
            'ORCID_EMAILS_BATCH_ID' => ['type' => 'index', 'columns' => ['ORCID_BATCH_ID'], 'length' => []],
        ],
        '_constraints' => [
            'ORCID_EMAILS_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
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
                'ORCID_BATCH_ID' => 1,
                'QUEUED' => '2019-03-18 15:16:17',
                'SENT' => '2019-03-18 15:16:17',
                'CANCELLED' => '2019-03-18 15:16:17'
            ],
        ];
        parent::init();
    }
}
