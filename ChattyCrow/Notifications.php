<?php
namespace Netbrick\ChattyCrow;

/**
 * Library for notifications actions
 *
 * @author tomas
 */
class Notifications extends ChattyRequest{
    /**
     * Common function for sending notification
     * @param array $contacts
     * @param array $payload
     * @return \stdClass
     */
    private function sendMessage($contacts, $payload){
        return $this->post('notification', array(
            'contacts' => $contacts,
            'payload' => $payload
        ));
    }
    /**
     * Send IOS notification
     * @param array $contacts
     * @param string $alert
     * @return \stdClass
     */
    public function sendIos($contacts, $alert){
        return $this->sendMessage($contacts, $alert);
    }
    /**
     * Send IOS notification with user defined payload
     * @param array $contacts
     * @param array $payload
     * @return \stdClass
     */
    public function sendIosWithPayload($contacts, $payload){
        return $this->sendMessage($contacts, $payload);
    }
    /**
     * Send android notification
     * @param array $contacts
     * @param array $data
     * @param string $collapseKey
     * @param int $timeToLive
     * @return \stdClass
     */
    public function sendAndroid($contacts, $data, $collapseKey, $timeToLive){
        $payload = array(
            'data' => $data,
            'collapse_key' => $collapseKey,
            'time_to_live' => $timeToLive
        );
        return $this->sendMessage($contacts, $payload);
    }
    /**
     * Send sms notification
     * @param array $contacts
     * @param string $body
     * @return \stdClass
     */
    public function sendSms($contacts, $body){
        $payload = array(
            'body' => $body
        );
        return $this->sendMessage($contacts, $payload);
    }
    /**
     * Send skype notification
     * @param array $contacts
     * @param string $body
     * @return \stdClass
     */
    public function sendSkype($contacts, $body){
        $payload = array(
            'body' => $body
        );
        return $this->sendMessage($contacts, $payload);
    }
    /**
     * Send jabber notification
     * @param array $contacts
     * @param string $body
     * @return \stdClass
     */
    public function sendJabber($contacts, $body){
        $payload = array(
            'body' => $body
        );
        return $this->sendMessage($contacts, $payload);
    }
    /**
     * Send email notification
     * @param array $contacts
     * @param string $subject
     * @param string $html
     * @param string $text
     * @param array $attachments [{name , mime_type, base64data}]
     * @return \stdClass
     */
    public function sendEmail($contacts, $subject, $html, $text, $attachments){
        $payload = array(
            'subject' => $subject,
            'html_body' => base64_encode($html),
            'text_body' => base64_encode($text),
            'attachments' => $attachments
        );
        return $this->sendMessage($contacts, $payload);
    }

    /**
     * Parse attachments from file
     * @param array $attachments [file_paths]
     * @return array {name , mime_type, base64data}
     */
    public static function parseAttachments($attachments){
        $parsed = array();
        foreach ($attachments as $path){
            $unix = strrchr($path, '/');
            $windows = strrchr($path, '\\');
            if($unix && $windows){
                $name = substr((strlen($windows) < strlen($unix) ? $windows : $unix), 1);
            }else{
                if($unix){
                    $name = substr($unix, 1);
                }elseif($windows){
                    $name = substr($windows, 1);
                }else{
                    $name = $path;
                }
            }
            $parsed[] = array(
                'name' => $name,
                'mime_type' => mime_content_type($path),
                'base64data' => base64_encode(file_get_contents($path))
            );
        }
        return $parsed;
    }
}
