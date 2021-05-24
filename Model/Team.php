<?php


namespace Study\Team\Model;


class Team extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'study_team_club';

    protected $_cacheTag = 'study_team_club';

    protected $_eventPrefix = 'study_team_club';

    protected function _construct()
    {
        $this->_init('Study\Team\Model\ResourceModel\Team');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
