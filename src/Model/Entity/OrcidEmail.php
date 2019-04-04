<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrcidEmail Entity
 *
 * @property int $ID
 * @property int $ORCID_USER_ID
 * @property int $ORCID_BATCH_ID
 * @property \Cake\I18n\FrozenTime|null $QUEUED
 * @property \Cake\I18n\FrozenTime|null $SENT
 * @property \Cake\I18n\FrozenTime|null $CANCELLED
 */
class OrcidEmail extends Entity
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
        'ORCID_BATCH_ID' => true,
        'QUEUED' => true,
        'SENT' => true,
        'CANCELLED' => true
    ];
}
