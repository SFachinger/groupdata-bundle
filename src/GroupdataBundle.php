<?php

declare(strict_types=1);

/*
 * This file is part of TestBundle.
 *
 * (c) Steffen Fachinger 2022 <steffen.fachnger@online.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/sfachinger/contao-TestBundle
 */

namespace SFachinger\GroupdataBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class SfachingerContaoTestBundle
 */

class GroupdataBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);

	}
}
?>
