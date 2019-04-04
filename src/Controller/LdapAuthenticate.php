<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cake\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Network\Request;
use Cake\Network\Response;

class LdapAuthenticate extends BaseAuthenticate {

    protected $_host = 'univad.stage.pitt.edu' ;

    public function authenticate(Request $request, Response $response) {
        $username = $request->data['username'] ;
        $password = $request->data['password'] ;
        $ds = @ldap_connect($this->_host) ;
        if (!$ds) {
            throw \Cake\Error\FatalErrorException ('Unable to connect to LDAP host.') ;
        }
        $basedn = "DC=univad,DC=stage,DC=pitt,DC=edu";
        $dn = "uid=".$username.", ".$basedn;
        $ldapbind = @ldap_bind($ds, $dn, $password);
        if (!$ldapbind) {
            return false ;
        }
        // Do whatever you want with your LDAP connection... 
        $entry = ldap_first_entry ($ldapbind) ;
        $attrs = ldap_get_attributes ($ldapbind, $entry) ;
        $user  = [] ;
        // Loop
        for ($i = 0 ; $i < $attrs["count"] ; $i++) {
            $user[$attrs[$i]] = ldap_values ($ldapbind, $entry, $attrs[$i])[0] ;
        }
        // Then close it and return the authenticated user
        ldap_unbind ($ldapbind) ;
        ldap_close ($ldapbind);
        return $user ;
    }

}
