<?php
namespace Netbrick\ChattyCrow;

/**
 * Library for contacts actions
 *
 * @author tomas
 */
class Contacts extends ChattyRequest{
    /**
     * Get contacts
     * @return array
     */
    public function getContacts(){
        return $this->get('contacts');
    }
    /**
     * Add new contacts
     * @param array $contacts
     * @return array
     */
    public function addContacts($contacts){
        return $this->post('contacts', array(
            'contacts' => $contacts
        ));
    }
    /**
     * Remove contacts
     * @param array $contacts
     * @return array
     */
    public function deleteContacts($contacts){
        return $this->delete('contacts', array(
            'contacts' => $contacts
        ));
    }
}
