<?php

namespace Xima\XmTools\Classes\API\REST\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Model class for sortables retrieved by the SortableRepository.
 *
 * @author Wolfram Eberius <woe@xima.de>
 */
class Sortable extends AbstractEntity
{
    /**
     * Sets the uid.
     *
     * @param int $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
}
