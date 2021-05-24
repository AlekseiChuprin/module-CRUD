<?php


namespace Study\Team\Model\ResourceModel\Team;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'study_team_club_collection';
    protected $_eventObject = 'club_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Study\Team\Model\Team', 'Study\Team\Model\ResourceModel\Team');
    }
}
