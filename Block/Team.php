<?php


namespace Study\Team\Block;


class Team extends \Magento\Framework\View\Element\Template
{



    /**
     * @var \Study\Team\Model\TeamFactory
     */
    protected $teamFactory;

    /**
     * @var \Study\Team\Model\ResourceModel\Team
     */
    protected $resourceTeam;

    protected $collection;

    /**
     * Team constructor.
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Study\Team\Model\TeamFactory $teamFactory
     * @param \Study\Team\Model\ResourceModel\Team $resourceTeam
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(
        \Study\Team\Model\TeamFactory $teamFactory,
        \Study\Team\Model\ResourceModel\Team $resourceTeam,
        \Study\Team\Model\ResourceModel\Team\Collection $collection,
        \Magento\Framework\View\Element\Template\Context $context
    )
    {
        $this->teamFactory = $teamFactory;
        $this->resourceTeam = $resourceTeam;
        $this->collection = $collection;
        parent::__construct($context);
    }

    /**
     * Return collecrion teams
     * @return mixed
     */
    public function getTeams()
    {
        return $this->collection;
    }

    /**
     * Return one team
     * @return mixed
     */
    public function getOneTeam()
    {
        $team = $this->teamFactory->create();
        $this->resourceTeam->load($team, $this->getParamId());

        return $team;
    }

    /**
     * return team id
     * @return mixed
     */
    protected function getParamId()
    {
        return $this->getRequest()->getParam('id');
    }
}
