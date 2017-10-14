<?php declare(strict_types=1);

namespace App\Components;

use App\Presenter\BasePresenter;
use Nette\Application\UI\Control;
use Nette\Security\User;

/**
 * Default class for Components.
 * Contains method for accesing BasePresenter and User. Provides access to translator and catchException method.
 *
 * @author  Zechy <email@zechy.cz>
 * @package App\Components
 */
abstract class Component extends Control {
	
	/**
	 * Method for accessing BasePresenter.
	 *
	 * @param bool $throw
	 * @return BasePresenter
	 */
	public function getPresenter($throw = true): BasePresenter {
		/** @var BasePresenter $presenter */
		$presenter = parent::getPresenter($throw);
		
		return $presenter;
	}
	
	/**
	 * @return User
	 */
	public function getUser(): User {
		return $this->getPresenter()->getUser();
	}
	
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
		return $this->getPresenter()->t($message, $count, $parameters, $domain, $locale);
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
		$this->getPresenter()->catchException($e, $message);
	}
	
	/**
	 * Render component.
	 */
	abstract public function render(): void;
}