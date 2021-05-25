<?php


namespace Study\Team\Controller\Index;


use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Validation\ValidationException;
use Magento\Framework\Message\ManagerInterface as MessageManagerInterface;

class Save implements ActionInterface, HttpPostActionInterface
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
        $data = $this->request->getParams();
        try {
            $team = $this->teamFactory->create();
            $this->resourceTeam->save($team->addData($data));
            $this->messageManager->addSuccessMessage(__('Saved successfully.'));

        } catch (ValidationException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while data save'));
        }

        return $this->resultFactory->create('redirect')->setPath('*/*/index');
    }
}
