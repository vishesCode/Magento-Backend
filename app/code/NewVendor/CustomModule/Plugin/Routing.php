<?php
namespace NewVendor\CustomModule\Plugin;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Cms\Controller\NoRoute\Index;
class Routing
{
    protected $url;

    public function __construct(
        \Magento\Framework\UrlInterface $url
    ) {
        $this->url = $url;
    }

    public function afterExecute(Index $subject, callable $proceed)
    {
        // Your custom logic to redirect to a specific page.
        $resultRedirect = $subject->resultRedirectFactory->create();
        $resultRedirect->setUrl($this->url->getUrl('/')); // Redirect to the homepage

        return $resultRedirect;
    }
}
