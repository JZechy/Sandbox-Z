# Sandbox-Z
Pre-configured PHP7.1 Nette sandbox.

## Using
```
composer create-project jzechy/sandbox-z
```

## Composer dependencies
Sandbox have pre-configured and ready this packages:
* **nette\nette** Nette Framework Metta package.
* **kdyby\translation** Translation extension.
* **kdyby\console** Implementation of Symfony console.
* **nextras\mail-panel** Capturing emails into Tracy Debugger bar.
* **nextras\orm** Database ORM extension.
* **nextras\migrations** Database migrations.
* **nette\tester** PHP unit testing. Dev dependency.

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