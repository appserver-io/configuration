<?php

/**
 * \AppserverIo\Configuration\Interfaces\ConfigurationInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author     Tim Wagner <tw@techdivision.com>
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Configuration\Interfaces;

/**
 * Interface ContainerConfiguration
 *
 * @author     Tim Wagner <tw@techdivision.com>
 * @author     Bernhard Wick <bw@appserver.io>
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */
interface ConfigurationInterface
{

    /**
     * Adds a new child configuration.
     *
     * @param \AppserverIo\Configuration\Interfaces\ConfigurationInterface $configuration The child configuration itself
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The configuration instance
     */
    public function addChild(ConfigurationInterface $configuration);

    /**
     * Appends the passed attributes to the configuration node. If the
     * attribute already exists it will be overwritten by default.
     *
     * @param array $data The data with the attributes to append
     *
     * @return void
     */
    public function appendData(array $data);

    /**
     * Checks if the passed configuration is equal. If yes, the method
     * returns TRUE, if not FALSE.
     *
     * @param \AppserverIo\Configuration\Interfaces\ConfigurationInterface $configuration The configuration to compare to
     *
     * @return boolean TRUE if the configurations are equal, else FALSE
     */
    public function equals(ConfigurationInterface $configuration);

    /**
     * Returns all attributes.
     *
     * @return array The array with all attributes
     */
    public function getAllData();

    /**
     * Returns the child configuration with the passed type.
     *
     * @param string $path The path of the configuration to return
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The requested configuration
     */
    public function getChild($path);

    /**
     * Returns all child configurations.
     *
     * @return array The child configurations
     */
    public function getChildren();

    /**
     * Returns the child configuration nodes with the passed type.
     *
     * @param string $path The path of the configuration to return
     *
     * @return array The requested child configuration nodes
     */
    public function getChilds($path);

    /**
     * Removes the children of the configuration with passed path and
     * returns the parent configuration.
     *
     * @param string $path The path of the configuration to remove the children for
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The instance the children has been removed
     */
    public function removeChilds($path);

    /**
     * Set's the configuration element's node name.
     *
     * @param string $nodeName The node name
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The instance itself
     */
    public function setNodeName($nodeName);

    /**
     * Returns the configuration element's node name.
     *
     * @return string The node name
     */
    public function getNodeName();

    /**
     * Initializes the configuration with the XML information found
     * in the file with the passed relative or absolute path.
     *
     * @param string $file The path to the file
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The initialized configuration
     * @throws \Exception Is thrown if the file with the passed name is not a valid XML file
     */
    public function initFromFile($file);

    /**
     * Initializes the configuration with the XML information passed as string.
     *
     * @param string $string The string with the XML content to initialize from
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The initialized configuration
     * @throws \Exception Is thrown if the passed XML string is not valid
     */
    public function initFromString($string);

    /**
     * Initializes the configuration with the XML information found
     * in the passed DOMDocument.
     *
     * @param \DOMDocument $domDocument The DOMDocument with XML information
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The initialized configuration
     */
    public function initFromDomDocument(\DOMDocument $domDocument);

    /**
     * Replaces actual children with the passed array. If children
     * already exists they will be lost.
     *
     * @param array $children The array with the children to set
     *
     * @return void
     */
    public function setChildren(array $children);

    /**
     * Checks if the node has children, if yes the method
     * returns TRUE, else the method returns FALSE.
     *
     * @return boolean TRUE if the node has children, else FALSE
     */
    public function hasChildren();

    /**
     * Adds the passed configuration value.
     *
     * @param string $key   Name of the configuration value
     * @param mixed  $value The configuration value
     *
     * @return void
     */
    public function setData($key, $value);

    /**
     * Returns the configuration value with the passed name.
     *
     * @param string $key The name of the requested configuration value.
     *
     * @return mixed The configuration value itself
     */
    public function getData($key);

    /**
     * Replaces actual attributes with the passed array. If attributes
     * already exists they will be lost.
     *
     * @param array $data The array with the key value attribute pairs
     *
     * @return void
     */
    public function setAllData($data);

    /**
     * Sets the configuration node's value e.g. <node>VALUE</node>.
     *
     * @param string $value The node's value
     *
     * @return void
     */
    public function setValue($value);

    /**
     * Returns the configuration node's value.
     *
     * @return string The node's value
     */
    public function getValue();

    /**
     * Merge the configuration
     *
     * @param \AppserverIo\Configuration\Interfaces\ConfigurationInterface $configuration A configuration to merge
     *
     * @return \AppserverIo\Configuration\Interfaces\ConfigurationInterface The instance
     */
    public function merge(ConfigurationInterface $configuration);

    /**
     * Returns the node signature using a hash based on
     * the node name and the param data.
     *
     * @return string The node signature as md5 hash
     */
    public function getSignature();

    /**
     * Returns TRUE if the node signatures are equals, else FALSE
     *
     * @param \AppserverIo\Configuration\Interfaces\ConfigurationInterface $configuration The configuration node to check the signature
     *
     * @return boolean TRUE if the signature of the passed node equals the signature of this instance, else FALSE
     */
    public function hasSameSignature(ConfigurationInterface $configuration);
}
