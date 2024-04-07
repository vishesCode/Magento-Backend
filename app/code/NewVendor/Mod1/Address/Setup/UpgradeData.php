<?php
namespace NewVendor\Mod1\Address\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $customerSetupFactory;

    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            $this->addNewAttributeToAddressForm($setup);
        }

        $setup->endSetup();
    }

    private function addNewAttributeToAddressForm(ModuleDataSetupInterface $setup)
    {
        /** @var CustomerSetup $customerSetup */
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $attributeCode = 'custom_text_attribute';

        $customerSetup->addAttribute(
            Customer::ENTITY,
            $attributeCode,
            [
                'type' => 'text',
                'label' => 'Custom Text Attribute',
                'input' => 'text',
                'source' => '',
                'required' => false,
                'visible' => true,
                'position' => 150,
                'system' => false,
                'backend' => ''
            ]
        );

        $customAttribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, $attributeCode);

        // Add the attribute to the customer address forms
        $customAttribute->addData(
            [
                'used_in_forms' => [
                    'adminhtml_customer_address',
                    'customer_address_edit',
                    'customer_register_address',
                    'adminhtml_checkout',
                    'customer_address'
                ],
            ]
        );

        $customAttribute->save();
    }
}
