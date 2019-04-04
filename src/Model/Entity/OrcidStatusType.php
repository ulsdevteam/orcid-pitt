<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrcidStatusType Entity
 *
 * @property int $ID
 * @property string $NAME
 * @property int|null $SEQ
 */
class OrcidStatusType extends Entity
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
        'SEQ' => true
    ];
}
