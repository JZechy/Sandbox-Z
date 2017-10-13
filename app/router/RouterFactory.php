<?php declare(strict_types=1);

namespace App;

use Nette\Application\IRouter;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\StaticClass;

/**
 * Class RouterFactory
 *
 * @author  Zechy <email@zechy.cz>
 * @package App
 */
final class RouterFactory {

	use StaticClass;
	
	/**
	 * @return IRouter
	 */
	public static function createRouter(): IRouter {
		$router = new RouteList();
		
		$router[] = new Route('<presenter>/<action>[/<id>]', [
			"module" => "Front",
			"presenter" => "Homepage",
			"action" => "default",
			"id" => null
		]);
		
		$router[] = new Route('<module>/<presenter>/<action>[/<id>]', [
			"module" => "Front",
			"presenter" => "Homepage",
			"action" => "default",
			"id" => null
		]);
		
		return $router;
	}
}