# Library to handle XML files in a tree structure

[![Latest Stable Version](https://img.shields.io/packagist/v/appserver-io/configuration.svg?style=flat-square)](https://packagist.org/packages/appserver-io/configuration) 
 [![Total Downloads](https://img.shields.io/packagist/dt/appserver-io/configuration.svg?style=flat-square)](https://packagist.org/packages/appserver-io/configuration)
 [![License](https://img.shields.io/packagist/l/appserver-io/configuration.svg?style=flat-square)](https://packagist.org/packages/appserver-io/configuration)
 [![Build Status](https://img.shields.io/travis/appserver-io/configuration/master.svg?style=flat-square)](http://travis-ci.org/appserver-io/configuration)
 [![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/appserver-io/configuration/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/appserver-io/configuration/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/appserver-io/configuration/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/appserver-io/configuration/?branch=master)

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

As described in the introduction the configuration is originally designed to work in a
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
