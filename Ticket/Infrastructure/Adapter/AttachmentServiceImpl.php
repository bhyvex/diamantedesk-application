<?php
/*
 * Copyright (c) 2014 Eltrino LLC (http://eltrino.com)
 *
 * Licensed under the Open Software License (OSL 3.0).
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://opensource.org/licenses/osl-3.0.php
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@eltrino.com so we can send you a copy immediately.
 */

namespace Eltrino\DiamanteDeskBundle\Ticket\Infrastructure\Adapter;

use Eltrino\DiamanteDeskBundle\Attachment\Api\Dto\FilesListDto;
use Eltrino\DiamanteDeskBundle\Attachment\Model\AttachmentHolder;
use Eltrino\DiamanteDeskBundle\Entity\Attachment;
use Eltrino\DiamanteDeskBundle\Entity\Ticket;
use Eltrino\DiamanteDeskBundle\Ticket\Api\Internal\AttachmentService;
use Eltrino\DiamanteDeskBundle\Ticket\Model\Comment;
use Eltrino\DiamanteDeskBundle\Ticket\Model\TicketRepository;

class AttachmentServiceImpl implements AttachmentService
{
    /**
     * @var \Eltrino\DiamanteDeskBundle\Attachment\Api\AttachmentService
     */
    private $attachmentContextService;

    public function __construct($attachmentContextService)
    {
        $this->attachmentContextService = $attachmentContextService;
    }

    /**
     * Creates Attachments for Holder
     * @param UploadedFile $file
     * @param AttachmentHolder $holder
     * @return void
     */
    public function createAttachmentsForItHolder(FilesListDto $filesListDto, AttachmentHolder $holder)
    {
        $this->attachmentContextService->createAttachments($filesListDto, $holder);
    }

    /**
     * Removes Attachment
     * @param Attachment $attachment
     * @return void
     */
    public function removeAttachmentFromItHolder(Attachment $attachment)
    {
        $this->attachmentContextService->removeAttachment($attachment->getId());
    }
}
