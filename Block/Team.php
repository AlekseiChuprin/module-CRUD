<?php


namespace Study\Team\Block;


class Team extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public $_pageFactory;

    /**
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    /**
     * @var \Study\Team\Model\TeamFactory
     */
    public $teamFactory;

    /**
     * @var \Study\Team\Model\ResourceModel\Team
     */
    public $resourceTeam;

    /**
     * Team constructor.
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Study\Team\Model\TeamFactory $teamFactory
     * @param \Study\Team\Model\ResourceModel\Team $resourceTeam
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Study\Team\Model\TeamFactory $teamFactory,
        \Study\Team\Model\ResourceModel\Team $resourceTeam,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->teamFactory = $teamFactory;
        $this->resourceTeam = $resourceTeam;
        $this->request = $request;
        parent::__construct($context);
    }

    /**
     * Return collecrion teams
     * @return mixed
     */
    public function getTeams()
    {
        $team = $this->teamFactory->create();
        $collection = $team->getCollection();

        return $collection;

    }

    /**
     * Return one team
     * @return mixed
     */
    public function getOneTeam()
    {
        $id = $this->request->getParam('id');
        $emptyTeam = $this->teamFactory->create();
        $this->resourceTeam->load($emptyTeam, $id);

        return $emptyTeam;
    }
}
