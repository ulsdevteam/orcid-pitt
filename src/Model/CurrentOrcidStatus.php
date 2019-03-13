<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * CurrentOrcidStatus Model
 *
 */
class CurrentOrcidStatus extends AppModel {

	public $belongsTo = array('OrcidStatusType', 'OrcidUser');

}
