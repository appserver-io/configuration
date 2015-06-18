<?php

/**
 * AppserverIo\Configuration\ConfigurationUtilsTest
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2015 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://github.com/appserver-io/configuration
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Configuration;

/**
 * Test implementation for the XML based configuration utilities implementation.
 *
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2015 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://github.com/appserver-io/configuration
 * @link      http://www.appserver.io
 */
class ConfigurationUtilsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The configuration instance to test.
     *
     * @var \AppserverIo\Configuration\ConfigurationUtils
     */
    protected $configurationUtils;

    /**
     * Initializes the configuration utils instance to test.
     *
     * @return void
     */
    public function setUp()
    {
        $this->configurationUtils = ConfigurationUtils::singleton();
    }

    /**
     * Test if the validation for a XML file works as expected.
     *
     * @return void
     */
    public function testValidateFileSuccessful()
    {
        $this->assertNull(
            $this->configurationUtils->validateFile(
                __DIR__ . '/_files/META-INF/appserver-02-ds.xml',
                __DIR__ . '/_files/META-INF/appserver.xsd',
                true
            )
        );
    }

    /**
     * Test if the validation for a XML throws an exception if the file
     * to validate has an invalid extension.
     *
     * @return void
     *
     * @expectedException AppserverIo\Configuration\ConfigurationException
     */
    public function testValidateFileWithInvalidExtensionAndException()
    {
        $this->configurationUtils->validateFile(
            __DIR__ . '/_files/META-INF/xml.xsd',
            __DIR__ . '/_files/META-INF/appserver.xsd',
            true
        );
    }

    /**
     * Test if the validation for a XML throws an exception if expected.
     *
     * @return void
     *
     * @expectedException AppserverIo\Configuration\ConfigurationException
     */
    public function testValidateFileWithException()
    {
        $this->configurationUtils->validateFile(
            __DIR__ . '/_files/META-INF/appserver-03-ds.xml',
            __DIR__ . '/_files/META-INF/appserver.xsd',
            true
        );
    }
}
