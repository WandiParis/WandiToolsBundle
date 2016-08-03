<?php

namespace Wandi\ToolsBundle\Tests\Util;

use Wandi\ToolsBundle\Util\HostParser;

class HostParserTest extends \PHPUnit_Framework_TestCase
{
    public function testParse(){
        $parser = new Wandi\ToolsBundle\Util\HostParser();

        $domainParsed = $parser->parse('domain.tdl');
        $this->assertEquals('domain.tdl', $domainParsed['domain']);
        $this->assertEquals(null, $domainParsed['subdomain']);

        $domainParsed = $parser->parse('www.domain.tdl');
        $this->assertEquals('domain.tdl', $domainParsed['domain']);
        $this->assertEquals('www', $domainParsed['subdomain']);

        $domainParsed = $parser->parse('subdomain.subdomain.domain.tdl');
        $this->assertEquals('domain.tdl', $domainParsed['domain']);
        $this->assertEquals('subdomain.subdomain', $domainParsed['subdomain']);
    }
}