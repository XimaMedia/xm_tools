<?php

namespace Xima\XmTools\Classes\Typo3;

/**
 * Helper for File Abstraction Layer.
 *
 * @author Steve Lenz <sle@xima.de>
 */
class FalHelper
{
    /**
     * Download a FAL-File.
     *
     * @param int $uid uid of originalFile (originalResource.originalFile.properties.uid)
     */
    public function downloadFile($uid)
    {
        $fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
        /* @var $fileRepository \TYPO3\CMS\Core\Resource\FileRepository */
        $entity = $fileRepository->findByUid($uid);

        if (!$entity) {
            return false;
        }

        $properties = $entity->getProperties();

        $headers = array(
            'Pragma' => 'public',
            'Expires' => 0,
            'Cache-Control' => 'public',
            'Content-Description' => 'File Transfer',
            'Content-Type' => $properties['mime_type'],
            'Content-Disposition' => 'attachment; filename="'.$entity->getName().'"',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Length' => $properties['size'],
        );

        try {
            $response = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Mvc\\Web\\Response');

            foreach ($headers as $header => $data) {
                $response->setHeader($header, $data);
            }
            $response->sendHeaders();
            echo $entity->getContents();
            exit;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
