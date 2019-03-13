 <?php 
class PeopleController extends AppController {

    public function view( $id ){
        if(!empty($id)){
            $filter = $this->Person->primaryKey."=".$id;
            $people = $this->Person->find('first', array( 'conditions'=>$filter));
            $this->set(compact('people'));
        }
    }

}
?> 
