<?php

declare (strict_types=1);
namespace Tecsafe\OFCP\Events\Models;

/**
 * The header of an email. Reused in all email events.
 */
final class EmailHeader implements \Tecsafe\OFCP\Events\OfcpEvent
{
    /**
     * The header of an email. Reused in all email events.
     * 
     * @param string $subject The subject of the email.
     * @param array $bcc BCC stands for "blind carbon copy". Just like CC, BCC is a way of sending copies of an email to other people. The difference between the two is that no one can see the list of recipients in a BCC message. The BCC list is private.
     * @param array $cc CC stands for "carbon copy". Sends a copy of the email to the people you list, in addition to the person in the To field. Note that everyone who receives a copy of the message will be able to see the list of recipients in the CC field. In nearly all cases you should use the "bcc" field instead of the "cc" field.
     * @param string $replyTo Set where replies to the email should be sent.
     * @param string $returnPath A return path is used to specify where bounced emails are sent and is placed in the email header. It’s an SMTP address separate from the sending address. This is a good practice for email delivery, as it gives bounced emails a place to land – other than in an inbox – making it easier to avoid sending notifications to bounced addresses. However, it’s important for authentication to ensure that the return path domain is the same as the sending domain. Brands use a return path that  stores all bounced emails, which helps them improve deliverability, making them more credible to inbox service providers (ISPs) like Gmail and Yahoo Mail. Return path also helps track email bounces and maintain email list hygiene.
     * @param array $to The email address of the recipient. You can include multiple email addresses, separated by commas. Note that everyone who receives a copy of the message will be able to see the list of recipients in the To field. If you want to send multiple emails without disclosing addresses, use the "bcc" field.
     * @return self
     */
    public function __construct(private string $subject, private ?array $bcc, private ?array $cc, private ?string $replyTo, private ?string $returnPath, private ?array $to)
    {
    }
    /**
     * Parse JSON data into an instance of this class.
     * 
     * @param string|array $json JSON data to parse.
     * @return self
     */
    public static function from_json(string|array $json): self
    {
        $data = \is_string($json) ? json_decode($json, true) : $json;
        return new self($data['subject'] ?? null, $data['bcc'] ?? null, $data['cc'] ?? null, $data['replyTo'] ?? null, $data['returnPath'] ?? null, $data['to'] ?? null);
    }
    public function getBcc(): ?array
    {
        return $this->bcc;
    }
    public function setBcc(?array $bcc): void
    {
        $this->bcc = $bcc;
    }
    public function getCc(): ?array
    {
        return $this->cc;
    }
    public function setCc(?array $cc): void
    {
        $this->cc = $cc;
    }
    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }
    public function setReplyTo(?string $replyTo): void
    {
        $this->replyTo = $replyTo;
    }
    public function getReturnPath(): ?string
    {
        return $this->returnPath;
    }
    public function setReturnPath(?string $returnPath): void
    {
        $this->returnPath = $returnPath;
    }
    public function getSubject(): string
    {
        return $this->subject;
    }
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }
    public function getTo(): ?array
    {
        return $this->to;
    }
    public function setTo(?array $to): void
    {
        $this->to = $to;
    }
    public function jsonSerialize(): array
    {
        return ['bcc' => $this->bcc, 'cc' => $this->cc, 'replyTo' => $this->replyTo, 'returnPath' => $this->returnPath, 'subject' => $this->subject, 'to' => $this->to];
    }
}