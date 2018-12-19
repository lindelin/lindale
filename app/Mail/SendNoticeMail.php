<?php

namespace App\Mail;

use App\Notice\Notice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNoticeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Notice
     */
    public $notice;

    /**
     * @var
     */
    public $locale;

    public function __construct(Notice $notice, $locale)
    {
        $this->notice = $notice;
        $this->locale = $locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \App::setLocale($this->locale);

        return $this->subject('【'.trans($this->notice->Type->name).'】'.$this->notice->title)
            ->cc(collect([$this->notice->Project->ProjectLeader])->when($this->notice->Project->SubLeader, function ($collection) {
                $collection->push($this->notice->Project->SubLeader);
            }))
            ->markdown('emails.notification.send-notice-mail')
            ->with(['notice' => $this->notice]);
    }
}
