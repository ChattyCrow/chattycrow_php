<?php
namespace Netbrick\ChattyCrow;

/**
 * Library for communication with ChattyCrow
 *
 * @author tomas
 */
class ChattyCrow {
    const DEFAULT_HOST = 'http://chattycrow.com/api/v1/';
    protected $host;
    protected $token;
    protected $channel;
    /** @var Contacts */
    protected $contactsModel;
    /** @var Notifications */
    protected $notificationsModel;

    /**
     * Construct new ChattyCrow client
     * @param string $token
     * @param string $channel
     * @param string $host
     */
    public function __construct($token, $channel, $host = null) {
        $this->host = ($host ?: self::DEFAULT_HOST);
        $this->token = $token;
        $this->channel = $channel;
        $this->contactsModel = new Contacts($this->host, $this->token, $this->channel);
        $this->notificationsModel = new Notifications($this->host, $this->token, $this->channel);
    }
    
    /************** Api functions ************/
    /**
     * Get contacts
     * @return \stdClass
     */
    public function getContacts(){
        return $this->contactsModel->getContacts();
    }
    /**
     * Add contacts
     * @param array $contacts
     * @return \stdClass
     */
    public function addContacts($contacts){
        return $this->contactsModel->addContacts($contacts);
    }
    /**
     * Remove contacts
     * @param array $contacts
     * @return \stdClass
     */
    public function deleteContacts($contacts){
        return $this->contactsModel->deleteContacts($contacts);
    }
    /**
     * Send IOS notification
     * @param string $alert
     * @param array $contacts
     * @return \stdClass
     */
    public function sendIos($alert, $contacts = array()){
        return $this->notificationsModel->sendIos($contacts, $alert);
    }
    /**
     * Send IOS notification with user defined payload
     * @param array $payload
     * @param array $contacts
     * @return \stdClass
     */
    public function sendIosWithPayload($payload, $contacts = array()){
        return $this->notificationsModel->sendIos($contacts, $payload);
    }
    /**
     * Send Android notification
     * @param array $data
     * @param string $collapseKey
     * @param int $timeToLive
     * @param array $contacts
     * @return \stdClass
     */
    public function sendAndroid($data, $collapseKey, $timeToLive, $contacts = array()){
        return $this->notificationsModel->sendAndroid($contacts, $data, $collapseKey, $timeToLive);
    }
    /**
     * Send jabber notification
     * @param string $body
     * @param array $contacts
     * @return \stdClass
     */
    public function sendJabber($body, $contacts = array()){
        return $this->notificationsModel->sendJabber($contacts, $body);
    }
    /**
     * Send skype notification
     * @param string $body
     * @param array $contacts
     * @return \stdClass
     */
    public function sendSkype($body, $contacts = array()){
        return $this->notificationsModel->sendSkype($contacts, $body);
    }
    /**
     * Send sms notification
     * @param string $body
     * @param array $contacts
     * @return \stdClass
     */
    public function sendSms($body, $contacts = array()){
        return $this->notificationsModel->sendSms($contacts, $body);
    }
    /**
     * Send email notification with pre-defined attachments
     * @param string $subject
     * @param string $html
     * @param string $text
     * @param array $attachments [{name , mime_type, base64data}]
     * @param array $contacts
     * @return \stdClass
     */
    public function sendEmail($subject, $html, $text, $attachments = array(), $contacts = array()){
        return $this->notificationsModel->sendEmail($contacts, $subject, $html, $text, $attachments);
    }
    /**
     * Send email notification with file attachments
     * @param string $subject
     * @param string $html
     * @param string $text
     * @param array $attachments [file_paths]
     * @param array $contacts
     * @return \stdClass
     */
    public function sendEmailWithFileAttachments($subject, $html, $text, $attachments, $contacts = array()){
        return $this->notificationsModel->sendEmail($contacts, $subject, $html, $text, Notifications::parseAttachments($attachments));
    }


    /************** Object functions ************/
    
    /**
     * Set token
     * @param string $token
     */
    public function setToken($token){
        $this->token = $token;
        $this->contactsModel->setToken($token);
        $this->contactsModel->setToken($token);
    }
    /**
     * Set channel
     * @param string $channel
     */
    public function setChannel($channel){
        $this->channel = $channel;
        $this->contactsModel->setChannel($channel);
        $this->contactsModel->setChannel($channel);
    }
    /**
     * Set host
     * @param string $host
     */
    public function setHost($host){
        $this->host = $host;
        $this->contactsModel->setHost($host);
        $this->contactsModel->setHost($host);
    }
    /**
     * Get channel
     * @return string
     */
    public function getToken(){
        return $this->token;
    }
    /**
     * Get channel
     * @return string
     */
    public function getChannel(){
        return $this->channel;
    }
    /**
     * Get host
     * @return string
     */
    public function getHost(){
        return $this->host;
    }
}
