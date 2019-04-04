<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrcidBatch Entity
 *
 * @property int $ID
 * @property string $NAME
 * @property string $SUBJECT
 * @property string $BODY
 * @property string $FROM_NAME
 * @property string $FROM_ADDR
 * @property string|null $REPLY_TO
 * @property int $ORCID_BATCH_CREATOR_ID
 */
class OrcidBatch extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ID' => true,
        'NAME' => true,
        'SUBJECT' => true,
        'BODY' => true,
        'FROM_NAME' => true,
        'FROM_ADDR' => true,
        'REPLY_TO' => true,
        'ORCID_BATCH_CREATOR_ID' => true
    ];
}
