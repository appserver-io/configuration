<?php

/**
 * \AppserverIo\Configuration\ConfigurationUtils
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
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */

namespace AppserverIo\Configuration;

/**
 * Configuration utility implementation.
 *
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2015 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://github.com/appserver-io/configuration
 * @link       http://www.appserver.io
 */
class ConfigurationUtils
{

    /**
     * The instance.
     *
     * @var \AppserverIo\Configuration\ConfigurationUtils
     */
    protected static $instance;

    /**
     * Protected constructor to avoid direct instanciation.
     */
    protected function __construct()
    {
    }

    /**
     * Creates a singleton instance of the utility class.
     *
     * @return \AppserverIo\Configuration\ConfigurationUtils The singleton instance
     */
    public function singleton()
    {

        // query whether we've already loaded an instance or not
        if (ConfigurationUtils::$instance == null) {
            ConfigurationUtils::$instance = new ConfigurationUtils();
        }

        // return the singleton instance
        return ConfigurationUtils::$instance;
    }

    /**
     * Will return recently found errors already formatted for output
     *
     * @param array $errors An array with error messages
     *
     * @return array The array with the formatted error messages
     */
    protected function prepareErrorMessages($errors)
    {
        $errorMessages = array();
        foreach ($errors as $error) {
            $errorMessages[] = sprintf(
                "Found a schema validation error on line %s with code %s and message %s when validating configuration file %s, see error dump below: %s",
                $error->line,
                $error->code,
                $error->message,
                $error->file,
                var_export($error, true)
            );
        }
        return $errorMessages;
    }

    /**
     * Will validate a given file against a schema. This method supports several validation
     * mechanisms for different file types. Will return TRUE if validation passes, FALSE
     * otherwise.
     *
     * @param string  $fileName     Name of the file to validate
     * @param string  $schemaFile   The specific schema file to validate against
     * @param boolean $failOnErrors If the validation should fail on error (optional)
     *
     * @return void
     *
     * @throws \AppserverIo\Configuration\ConfigurationException If aren't able to validate this file type
     */
    public function validateFile($fileName, $schemaFile, $failOnErrors = false)
    {

        // check by the files extension if we're able to validate the file
        switch ($extension = pathinfo($fileName, PATHINFO_EXTENSION)) {

            // in case we found a XML file
            case 'xml':

                // validate the DOM document instance
                $domDocument = new \DOMDocument();
                $domDocument->load($fileName);
                $result = ConfigurationUtils::singleton()->validateXml($domDocument, $schemaFile, $failOnErrors);
                break;

            // in all other cases we throw an excption
            default:

                throw new ConfigurationException(
                    sprintf(
                        'Could not find a validation method for file %s as the extension %s is not supported.',
                        $fileName,
                        $extension
                    )
                );
                break;
        }
    }

    /**
     * Will validate a DOM document against a schema file. Will return TRUE if validation
     * passes, FALSE otherwise.
     *
     * @param \DOMDocument $domDocument  DOM document to validate
     * @param string       $schemaFile   The specific schema file to validate against
     * @param boolean      $failOnErrors If the validation should fail on error (optional)
     *
     * @return void
     *
     * @throws \AppserverIo\Configuration\ConfigurationException If $failOnErrors is set to true an exception will be thrown on errors
     */
    public function validateXml(\DOMDocument $domDocument, $schemaFile, $failOnErrors = false)
    {

        // activate internal error handling, necessary to catch errors with libxml_get_errors()
        libxml_use_internal_errors(true);

        // prepare result and error messages
        $errorMessages = array();

        // validate the configuration file with the schema
        if ($domDocument->schemaValidate($schemaFile) === false) {
            // collect the errors and return as a failure
            $errorMessages = ConfigurationUtils::singleton()->prepareErrorMessages(libxml_get_errors());

            // if we have to fail on errors we might do so here
            if ($failOnErrors === true) {
                throw new ConfigurationException(reset($errorMessages));
            }
        }
    }
}
