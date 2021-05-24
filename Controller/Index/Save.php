<?php


namespace Study\Team\Controller\Index;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;

class Save implements ActionInterface, HttpGetActionInterface
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
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @var \Study\Team\Model\ResourceModel\Team
     */
    public $resourceTeam;

    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    public $resultFactory;

    /**
     * Save constructor.
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Study\Team\Model\TeamFactory $teamFactory
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Study\Team\Model\ResourceModel\Team $resourceTeam
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     */
    public function __construct(
        //\Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Study\Team\Model\TeamFactory $teamFactory,
        \Magento\Framework\App\RequestInterface $request,
        \Study\Team\Model\ResourceModel\Team $resourceTeam,
        \Magento\Framework\Controller\ResultFactory $resultFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->teamFactory = $teamFactory;
        $this->request = $request;
        $this->resourceTeam = $resourceTeam;
        $this->resultFactory = $resultFactory;
        //parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute()
    {
        $data = $this->request->getParams();
        $team = $this->teamFactory->create();
        $this->resourceTeam->save($team->setData($data));

        return $this->resultFactory->create('redirect')->setPath('*/*/index');
    }
}
