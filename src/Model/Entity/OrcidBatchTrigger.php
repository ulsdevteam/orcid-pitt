<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrcidBatchTrigger Entity
 *
 * @property int $ID
 * @property string $NAME
 * @property int $ORCID_STATUS_TYPE_ID
 * @property int $ORCID_BATCH_ID
 * @property int $TRIGGER_DELAY
 * @property int|null $ORCID_BATCH_GROUP_ID
 * @property \Cake\I18n\FrozenTime|null $BEGIN_DATE
 * @property int|null $REQUIRE_BATCH_ID
 * @property int $REPEAT
 * @property int $MAXIMUM_REPEAT
 */
class OrcidBatchTrigger extends Entity
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
        'ORCID_STATUS_TYPE_ID' => true,
        'ORCID_BATCH_ID' => true,
        'TRIGGER_DELAY' => true,
        'ORCID_BATCH_GROUP_ID' => true,
        'BEGIN_DATE' => true,
        'REQUIRE_BATCH_ID' => true,
        'REPEAT' => true,
        'MAXIMUM_REPEAT' => true
    ];
}
