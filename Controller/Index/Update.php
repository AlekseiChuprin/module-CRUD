<?php


namespace Study\Team\Controller\Index;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;
use Magento\Framework\Validation\ValidationException;

class Update implements ActionInterface, HttpGetActionInterface
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

    protected $messageManager;

    /**
     * Update constructor.
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
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        MessageManagerInterface $messageManager
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->teamFactory = $teamFactory;
        $this->request = $request;
        $this->resourceTeam = $resourceTeam;
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
        //parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        try {
            $team = $this->teamFactory->create();
            $this->resourceTeam->load($team, $id);
            $data = $this->request->getParams();
            $team->addData($data);
            $this->resourceTeam->save($team);
            $this->messageManager->addSuccessMessage(__('Team updated successfully.'));

        } catch (ValidationException $e){
            $this->messageManager->addErrorMessage($e->getMessage());
            $redirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $redirect->setUrl("/team/index/edit/id/$id/");

            return $redirect;
        }

        return $this->resultFactory->create('redirect')->setPath('*/*/index');
    }
}
