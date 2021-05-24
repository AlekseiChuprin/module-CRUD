<?php


namespace Study\Team\Controller\Index;


use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;

class Delete implements ActionInterface, HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    public $resultFactory;

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
     * Delete constructor.
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     * @param \Study\Team\Model\TeamFactory $teamFactory
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Study\Team\Model\ResourceModel\Team $resourceTeam
     */
    public function __construct(
        //\Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        \Study\Team\Model\TeamFactory $teamFactory,
        \Magento\Framework\App\RequestInterface $request,
        \Study\Team\Model\ResourceModel\Team $resourceTeam
    )
    {
        $this->resultFactory = $resultFactory;
        $this->teamFactory = $teamFactory;
        $this->request = $request;
        $this->resourceTeam = $resourceTeam;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception\
     */
    public function execute()
    {
        $id = $this->request->getParam('id');
        $teamEmptyModel = $this->teamFactory->create();
        $this->resourceTeam->load($teamEmptyModel, $id)->delete($teamEmptyModel, $id);

        return $this->resultFactory->create('redirect')->setPath('*/*/index');
    }
}
