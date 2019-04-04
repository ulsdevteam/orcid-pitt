<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrcidUsersFixture
 *
 */
class OrcidUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => null, 'null' => false, 'default' => '"ULS"."ISEQ$$_92263".nextval', 'comment' => 'Row UUID', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'USERNAME' => ['type' => 'string', 'length' => '8', 'null' => false, 'default' => null, 'comment' => 'External reference to the user to whom this ORCID belongs', 'precision' => null, 'fixed' => null, 'collate' => null],
        'ORCID' => ['type' => 'string', 'length' => '19', 'null' => true, 'default' => null, 'comment' => 'The ORCID', 'precision' => null, 'fixed' => null, 'collate' => null],
        'TOKEN' => ['type' => 'string', 'length' => '255', 'null' => true, 'default' => null, 'comment' => 'An ORCID Scope Token', 'precision' => null, 'fixed' => null, 'collate' => null],
        'CREATED' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Record creation datetime', 'precision' => null],
        'MODIFIED' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'Record modification datetime', 'precision' => null],
        '_indexes' => [
            'ORCID_USERS_ORCID' => ['type' => 'index', 'columns' => ['ORCID'], 'length' => []],
        ],
        '_constraints' => [
            'ORCID_USERS_USERNAME' => ['type' => 'unique', 'columns' => ['USERNAME'], 'length' => []],
            'ORCID_USERS_ID' => ['type' => 'unique', 'columns' => ['ID'], 'length' => []],
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
                'USERNAME' => 'Lorem ',
                'ORCID' => 'Lorem ipsum dolor',
                'TOKEN' => 'Lorem ipsum dolor sit amet',
                'CREATED' => '2019-03-18 15:16:37',
                'MODIFIED' => '2019-03-18 15:16:37'
            ],
        ];
        parent::init();
    }
}
