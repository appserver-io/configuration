<?php

/**
 * \AppserverIo\Configuration\Interfaces\ValidityAwareConfigurationInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Configuration\Interfaces;

/**
 * Interface ValidityAwareConfigurationInterface which defines a configuration which is able to validate itself against
 * a schema
 *
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */
interface ValidityAwareConfigurationInterface
{

    /**
     * Returns the filename of the schema file used for validation.
     *
     * @return string The filename of the schema file used for validation
     */
    public function getSchemaFile();

    /**
     * Sets the filename of the schema file used for validation.
     *
     * @param string $schemaFile Filename of the schema for validation of the configuration node
     *
     * @return void
     */
    public function setSchemaFile($schemaFile);

    /**
     * Validates the configuration node against the schema file.
     *
     * @return \DOMDocument The validated DOM document
     *
     * @throws \Exception Is thrown if the validation was not successful
     */
    public function validate();
}
