<?php declare(strict_types=1);

namespace App\Components;

/**
 * Default class for Forms component. Provides onSuccess, onError callbacks
 * and default form creation with translator and set up onSuccess callback.
 *
 * @author  Zechy <email@zechy.cz>
 * @package App\Components
 *
 * @method onSuccess() Callback after successful processed form.
 * @method onError() Callback when error apears during processing form.
 */
abstract class Form extends Component {
	
	/** @var array Callback after successful processed form. */
	public $onSuccess = [];
	
	/** @var array Callback when error apears during processing form. */
	public $onError = [];
	
	/** @var string Custom message when error appears. */
	private $errorMessage = "global.error.common";
	
	/** @var bool If the form is successfuly processed without any php or custom errors. Prevents onSuccess callback. */
	protected $hasErrors = false;
	
	/**
	 * Set custom message for user when error appears.
	 *
	 * @param string $errorMessage
	 */
	public function setErrorMessage(string $errorMessage): void {
		$this->errorMessage = $errorMessage;
	}
	
	/**
	 * @return string
	 */
	public function getErrorMessage(): string {
		return $this->errorMessage;
	}
	
	/**
	 * Default created form with set up translator and onSuccess method.
	 *
	 * @return \Nette\Application\UI\Form
	 */
	protected function createForm(): \Nette\Application\UI\Form {
		$form = new \Nette\Application\UI\Form();
		$form->setTranslator($this->getPresenter()->translator);
		$form->onSuccess[] = [$this, "sendedForm"];
		
		return $form;
	}
	
	/**
	 * Default onSuccess callback for form, encapsulates custom form processing in try-catch.
	 *
	 * @param \Nette\Application\UI\Form $form
	 * @throws \Exception
	 */
	public function sendedForm(\Nette\Application\UI\Form $form): void {
		$ok = true;
		try {
			$this->processForm($form);
		} catch(\Exception $e) {
			$ok = false;
			$this->getPresenter()->catchException($e, $this->errorMessage);
			$this->onError();
		} finally {
			if($ok && !$this->hasErrors) {
				$this->onSuccess();
			}
		}
	}
	
	/**
	 * Method for custom processing of form data.
	 *
	 * @param \Nette\Application\UI\Form $form
	 */
	abstract public function processForm(\Nette\Application\UI\Form $form): void;
}