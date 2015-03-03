<?php

/**
 * \AppserverIo\Configuration\Interfaces\PersistableConfigurationInterface
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
 * Interface PersistableConfigurationInterface which allows for persistence of a configuration into DOM and file
 *
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */
interface PersistableConfigurationInterface
{

    /**
     * Saves the configuration node recursively to the
     * file with the passed name.
     *
     * @param string $filename The filename to save the configuration node to
     *
     * @return void
     */
    public function save($filename);

    /**
     * Creates and returns a DOM document by recursively parsing
     * the configuration node and it's children.
     *
     * @param string $namespaceURI The dom document namespace
     *
     * @return \DOMDocument The configuration node as DOM document
     */
    public function toDomDocument($namespaceURI = 'http://www.appserver.io/appserver');

    /**
     * Recursively creates and returns a DOM element of this configuration node.
     *
     * @param \DOMDocument $domDocument  The DOM document necessary to create a \DOMElement instance
     * @param string       $namespaceURI The namespace URI to use
     *
     * @return \DOMElement The initialized DOM element
     */
    public function toDomElement(\DOMDocument $domDocument, $namespaceURI = null);
}
