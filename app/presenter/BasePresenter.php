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
	
	/** @var Translator @inject Translator. */
	public $translator;
	
	/**
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
	 * @param \Exception $e
	 * @param string     $message
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