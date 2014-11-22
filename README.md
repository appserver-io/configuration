# Library to handle XML files in a tree structure

[![Latest Stable Version](https://poser.pugx.org/appserver-io/configuration/v/stable.png)](https://packagist.org/packages/appserver-io/configuration) [![Total Downloads](https://poser.pugx.org/appserver-io/configuration/downloads.png)](https://packagist.org/packages/appserver-io/configuration) [![Latest Unstable Version](https://poser.pugx.org/appserver-io/configuration/v/unstable.png)](https://packagist.org/packages/appserver-io/configuration) [![License](https://poser.pugx.org/appserver-io/configuration/license.png)](https://packagist.org/packages/appserver-io/configuration) [![Build Status](https://travis-ci.org/appserver-io/configuration.png)](https://travis-ci.org/appserver-io/configuration)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/appserver-io/configuration/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/appserver-io/configuration/?branch=master)[![Code Coverage](https://scrutinizer-ci.com/g/appserver-io/configuration/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/appserver-io/configuration/?branch=master)

## Introduction

This package provides generic XML handling functionality, designed to work in an 
application server like appserver.io. The configuration contains the XML structure in
a simple object structure that makes it synchronziable between threads.

## Installation

You don't have to install this package, as it'll be delivered with the latest appserver.io 
release. If you want to install it with your application only, you do this by add

```sh
{
    "require": {
        "appserver-io/configuration": "dev-master"
    },
}
```

to your ```composer.json``` and invoke ```composer update``` in your project.

## Usage

As described in the introdcution the configuration is originally designed to work in a
runtime environment like appserver.io provides it. The big advantage is, that it does
not contain any not synchronizable instances which allows you to share it between
threads.

The configuration needs a XML file, the structure is not important, and converts it
into an object structure:

```php

// initialize the configuration with the content XML configuration file
$configuration = new Configuration();
$configuration->initFromFile('/your/file.xml');

// add a new node XML to the root node 
$configuration->addChildWithNameAndValue('baseDirectory', '/application/base/directory');

```

# External Links

* Documentation at [appserver.io](http://docs.appserver.io)
* Documentation on [GitHub](https://github.com/techdivision/TechDivision_AppserverDocumentation)
* [Getting started](https://github.com/techdivision/TechDivision_AppserverDocumentation/tree/master/docs/getting-started)