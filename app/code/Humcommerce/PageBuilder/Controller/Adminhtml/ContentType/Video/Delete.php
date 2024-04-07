<?php
/**
 * Copyright © Team Humcommerce. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Humcommerce\PageBuilder\Controller\Adminhtml\ContentType\Video;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Filesystem\DriverPool;
use Magento\Framework\Exception\FileSystemException;

/**
 * Video upload controller
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    const UPLOAD_DIR = 'videos';

    const ADMIN_RESOURCE = 'Magento_Backend::content';


    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $resultJsonFactory;


    /**
     * @var Filesystem\Directory\WriteInterface
     */
    private $mediaDirectory;

    /**
     * @var DriverPool|null
     */
    private $driverPool;

    /**
     * @var DriverInterface|null
     */
    private $fileDriver;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param DriverPool $driverPool
     * @param Filesystem|null $filesystem
     * @throws \Magento\Framework\Exception\FileSystemException
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        DriverPool $driverPool,
        Filesystem $filesystem = null
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->driverPool = $driverPool;
        $filesystem = $filesystem ?? ObjectManager::getInstance()->create(Filesystem::class);
        $this->mediaDirectory = $filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        $this->execute();
    }


    public function execute()
    {
        $fileName = $this->getRequest()->getParam('filename');
        $result['success'] = false;
        try{
            $filepath = $this->getUploadDir() . '/' . $fileName;
            $fileDriver = $this->getFileDriver();
            if($fileDriver->isExists($filepath)){
                $fileDriver->deleteFile($filepath);
            }
            $result['success'] = true;
        } catch (\Exception $e) {
            $result = [
                'error' => $e->getMessage(),
                'errorcode' => $e->getCode()
            ];
        }
        
        return $this->resultJsonFactory->create()->setData($result);
    }

    

    /**
     * Return the upload directory
     *
     * @return string
     */
    private function getUploadDir()
    {
        return $this->mediaDirectory->getAbsolutePath(self::UPLOAD_DIR);
    }

    /**
     * Get driver for file
     *
     * @deprecated
     * @return DriverInterface
     */
    private function getFileDriver(): DriverInterface
    {
        if (!$this->fileDriver) {
            $this->fileDriver = $this->driverPool->getDriver(DriverPool::FILE);
        }

        return $this->fileDriver;
    }


}
