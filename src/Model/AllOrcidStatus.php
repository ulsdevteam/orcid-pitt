<?php
namespace app\Model;

use App\Model\AppModel;
/**
 * AllOrcidStatus Model
 *
 */
class AllOrcidStatus extends AppModel {

	public $belongsTo = array('OrcidStatusType');

}
