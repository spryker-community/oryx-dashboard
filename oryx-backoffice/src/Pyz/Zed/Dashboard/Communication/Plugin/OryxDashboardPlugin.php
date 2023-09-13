<?php declare(strict_types=1);

namespace Pyz\Zed\Dashboard\Communication\Plugin;

use Spryker\Shared\Dashboard\Dependency\Plugin\DashboardPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class OryxDashboardPlugin extends AbstractPlugin implements DashboardPluginInterface
{
    public function render(): string
    {
        return '<iframe width="100%" height="1100px" src="http://localhost:3000/"></iframe>';
    }
}
