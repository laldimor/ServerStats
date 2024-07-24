<?php
namespace Aldimor\ServerStats\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('System Stats'));
        return $resultPage;
    }

    public function getSystemStats()
    {
        // Getting Disk Space
        $diskFreeSpace = disk_free_space("/");
        $diskTotalSpace = disk_total_space("/");
        $diskUsedSpace = $diskTotalSpace - $diskFreeSpace;

        $diskUsagePercentage = ($diskUsedSpace / $diskTotalSpace) * 100;
        if ($diskUsagePercentage > 100) {
            $diskUsagePercentage = 100;
        }

        // Getting Memory and CPU Usage
        $memoryUsage = memory_get_usage(true);
        $memoryPeakUsage = memory_get_peak_usage(true);
        $cpuLoad = sys_getloadavg();

        return [
            'disk_free_space' => $diskFreeSpace,
            'disk_total_space' => $diskTotalSpace,
            'disk_used_space' => $diskUsedSpace,
            'disk_usage_percentage' => $diskUsagePercentage,
            'memory_usage' => $memoryUsage,
            'memory_peak_usage' => $memoryPeakUsage,
            'cpu_load' => $cpuLoad,
        ];
    }
}
