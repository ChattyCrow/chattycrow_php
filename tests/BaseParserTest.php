<?php
/**
 * Test case for chattycrow php module
 */
require_once './ChattyCrowAutoload.php';

class BaseParserTest extends PHPUnit_Framework_TestCase
{
  public function testCanBeNegated()
  {
    $instance = new Netbrick\ChattyCrow\ChattyCrow("TOKEN1", "CHANNEL1");

    $this->assertEquals("TOKEN1", $instance->getToken());
    $this->assertEquals("CHANNEL1", $instance->getChannel());
  }
}
?>
