<?php 
declare(strict_types= 1);

namespace Training\Example\Controller\Index;

use Magento\Framework\App\ActionInterface;



protected $resultFacrtory;
class Index implements ActionInterface {


    public function  __construct (\Magento\Framework\Controller\Result\RawFactory $resultFacrtory ){
    $this->resultFacrtory = $resultFacrtory;
    }
    public function execute(){
        return $this->resultFactory->content()->setContents('Example');
        
    }
}