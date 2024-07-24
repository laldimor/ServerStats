<?php
namespace Aldimor\ServerStats\Block\Adminhtml\System;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Aldimor\ServerStats\Controller\Adminhtml\Index\Index;

class Stats extends Template
{
    protected $systemStats;

    public function __construct(Context $context, Index $systemStats, array $data = [])
    {
        $this->systemStats = $systemStats;
        parent::__construct($context, $data);
    }

    public function getSystemStats()
    {
        return $this->systemStats->getSystemStats();
    }

    public function getCpuLoadPercentage()
    {
        return $this->calculateCpuLoadPercentage();
    }

    protected function calculateCpuLoadPercentage()
    {
        $load = sys_getloadavg();
        $cpuCores = shell_exec('nproc'); // Para sistemas Linux
        $cpuCores = (int)trim($cpuCores);

        if ($cpuCores <= 0) {
            return 0;
        }

        $loadAverage = $load[0];
        $cpuLoadPercentage = ($loadAverage / $cpuCores) * 100;

        if ($cpuLoadPercentage > 100) {
            $cpuLoadPercentage = 100;
        }

        return $cpuLoadPercentage;
    }
}
