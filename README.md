# Sandbox-Z

[![Latest stable](https://img.shields.io/packagist/v/jzechy/sandbox-z.svg?style=flat-square)](https://packagist.org/packages/jzechy/sandbox-z)
[![license](https://img.shields.io/github/license/jzechy/sandbox-z.svg?maxAge=2592000&style=flat-square)](https://github.com/JZechy/Sandbox-Z/blob/master/LICENSE)
[![Downloads Total](https://img.shields.io/packagist/dt/jzechy/sandbox-z.svg?style=flat-square)](https://packagist.org/packages/jzechy/sandbox-z)

Pre-configured PHP7.1 Nette sandbox.

## Using
```
composer create-project jzechy/sandbox-z
```

## Composer dependencies
Sandbox have pre-configured and ready this packages:
* **nette/nette** Nette Framework Metta package.
* **kdyby/translation** Translation extension.
* **kdyby/console** Implementation of Symfony console.
* **nextras/mail-panel** Capturing emails into Tracy Debugger bar.
* **nextras/orm** Database ORM extension.
* **nextras/migrations** Database migrations.
* **nette/tester** PHP unit testing. Dev dependency.

## Composer projects
Composer helpful project, installed after Sandbox-Z composer installation.
* **nette\code-checker** A simple tool to check source code against a set of Nette coding standards.

## Structure
* **components** Folder for common components.
* **config** Project configuration files.
* **lang** Language resources for translator.
* **model** Folder for model classes.
* **modules** Folder for application modules.
  * **front** Default Front module.
* **presenter** Folder for common presenters.

## Basic classes
* **BasePresenter** Base presenter class.
* **Component** Base class for components.
* **Form** Base class for form components.
* **Orm** Nextras ORM model class fo repositories.
* **RouterFactory** Default routing class.

## BIN files
* **code.bat** File to run code-checker for all files in app folder.
* **console.bat** File to run Kdyby\Console.