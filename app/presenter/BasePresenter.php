<?php declare(strict_types=1);

namespace App\Presenter;

use Kdyby\Translation\Translator;
use Nette\Application\UI\ITemplate;
use Nette\Application\UI\Presenter;
use Tracy\Debugger;

/**
 * Class BasePresenter
 *
 * @author  Zechy <email@zechy.cz>
 * @package App\Presenter
 *
 * @property-read ITemplate|\stdClass $template
 */
abstract class BasePresenter extends Presenter {
	
	/** @var Translator @inject Instacnce of Kdyby Translator. */
	public $translator;
	
	/**
	 * Translates given resource.
	 *
	 * @param string      $message
	 * @param int|null    $count
	 * @param array       $parameters
	 * @param null|string $domain
	 * @param null|string $locale
	 * @return string
	 */
	public function t(string $message, ?int $count = null, array $parameters = [], ?string $domain = null, ?string $locale = null): string {
		return $this->translator->translate($message, $count, $parameters, $domain, $locale);
	}
	
	/**
	 * Catch thrown exception. If in production mode, exception is logged and flash message is shown.
	 * If in debug mode, the exception is thrown to the screen.
	 *
	 * @param \Exception $e Catched exception.
	 * @param string     $message Custom message for user.
	 * @throws \Exception
	 */
	public function catchException(\Exception $e, string $message = "global.error.common"): void {
		if(Debugger::$productionMode) {
			Debugger::log($e->getMessage(), Debugger::EXCEPTION);
			$this->flashMessage($this->t($message), "danger");
		} else {
			throw $e;
		}
	}
}