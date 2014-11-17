<?php
namespace Netbrick\ChattyCrow;

use Httpful\Request;

/**
 * Abstract class for requests
 *
 * @author tomas
 */
class ChattyRequest{
    protected $host;
    protected $token;
    protected $channel;
    
    public function __construct($host, $token, $channel) {
        $this->host = $host;
        $this->token = $token;
        $this->channel = $channel;
    }
    
    /**
     * Get method
     * @param string $url
     * @param array|stdClass|string $json
     * @return \stdClass
     */
    protected function get($url){
        return $this->send(Request::get($this->host.$url));
    }
    
    /**
     * Post method
     * @param string $url
     * @param array|stdClass|string $json
     * @return \stdClass
     */
    protected function post($url, $json){
        return $this->send(Request::post($this->host.$url, json_encode($json)));
    }
    
    /**
     * Delete method
     * @param string $url
     * @param array|stdClass|string $json
     * @return \stdClass
     */
    protected function delete($url, $json){
        return $this->send(Request::delete($this->host.$url)->body(json_encode($json)));
    }
    
    /**
     * Put method
     * @param string $url
     * @param array|stdClass|string $json
     * @return \stdClass
     */
    protected function put($url, $json){
        return $this->send(Request::put($this->host.$url, json_encode($json)));
    }
    
    /**
     * Send REST with headers
     * @param \Httpful\Request $request
     * @return \stdClass
     */
    protected function send(Request $request){
        return json_decode($request->addHeaders(array(
            'Token' => $this->token,
            'Channel' => $this->channel
        ))->contentType('application/json')->expectsType('application/json')->send());
    }
}
