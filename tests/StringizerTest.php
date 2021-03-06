<?php
use Stringizer\Stringizer;

/**
 * Stringizer Unit Tests
 */
class StringizerTest extends PHPUnit_Framework_TestCase
{

    public function testNoTransformationApplied()
    {
        $s = new Stringizer("fizz");
        $this->assertEquals("fizz", $s);
    }

    public function testNoChangeToOriginal()
    {
        $s = new Stringizer("fizz");
        $this->assertEquals("fizz", $s->getStringOriginal());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentNull()
    {
        new Stringizer(null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArguementArrayEmpty()
    {
        new Stringizer(array());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArguementArray()
    {
        new Stringizer(array(
            "string"
        ));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidObjectWithNoToString()
    {
        new Stringizer((object) array());
    }

    public function testSetter()
    {
        $s = new Stringizer("fizz");
        $this->assertEquals("fizz", $s);
        
        $s->setString("buzz");
        $this->assertEquals("buzz", $s);
    }

    public function testEncoding()
    {
        $s = new Stringizer("Fizz Buzz");
        
        $s->setEncoding("iso-8859-1");
        $this->assertEquals("iso-8859-1", $s->getEncoding());
        
        $s->setEncoding("UTF-8");
        $this->assertEquals("UTF-8", $s->getEncoding());
    }
}
