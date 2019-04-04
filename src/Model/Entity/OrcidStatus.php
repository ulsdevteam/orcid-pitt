<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrcidStatus Entity
 *
 * @property int $ID
 * @property int $ORCID_USER_ID
 * @property int $ORCID_STATUS_TYPE_ID
 * @property \Cake\I18n\FrozenTime $STATUS_TIMESTAMP
 */
class OrcidStatus extends Entity
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
        'ORCID_USER_ID' => true,
        'ORCID_STATUS_TYPE_ID' => true,
        'STATUS_TIMESTAMP' => true
    ];
}
