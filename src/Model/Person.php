 <?php  
class Person extends AppModel {

    var $useDbConfig = 'ldap';

    // This would be the ldap equivalent to a primary key if your dn is 
    // in the format of uid=username, ou=people, dc=example, dc=com
    var $primaryKey = 'CN';     

    // The table would be the branch of your basedn that you defined in 
    // the database config
    var $useTable = 'ou=Accounts,dc=univ,dc=pitt,dc=edu'; 

    var $validate = array(
        'cn' => array(
            'alphaNumeric' => array(
                'rule' => array('custom', '/^[a-zA-Z]*$/'),
                'required' => true,
                'message' => 'Only Letters and Numbers can be used for CN.'
            ),
        ),
        'email' => array(
            'rule' => 'email',
            'required' => true,
            'on' => 'create',
            'message' => 'Must Contain a Valid Email Address.'
        ),
    );

            
}
?> 
