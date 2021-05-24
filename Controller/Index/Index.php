<?php


namespace Study\Team\Controller\Index;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;

class Index implements ActionInterface, HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Study\Team\Model\TeamFactory
     */
    protected $teamFactory;

    /**
     * Index constructor.
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Study\Team\Model\TeamFactory $teamFactory
     */
    public function __construct(
        //\Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Study\Team\Model\TeamFactory $teamFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->teamFactory = $teamFactory;
        //parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
