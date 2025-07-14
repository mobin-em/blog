<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;

class ReplyNotification extends Notification
{
    use Queueable;

    public $reply;
    public $replier; // 👈 اضافه کردن

    public function __construct($reply)
    {
        $this->reply = $reply;
        $this->replier = $reply->user; // 👈 ریپلای‌کننده رو ذخیره می‌کنیم
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('✅ پاسخ جدید به نظر شما')
            ->greeting("سلام {$notifiable->name} عزیز!")
            ->line("کاربر «{$this->replier->name}» به کامنت شما پاسخ داده است:")
            ->line("📨 پاسخ: {$this->reply->content}")
            ->action('مشاهده پاسخ', url("/posts/{$this->reply->post_id}#comment-{$this->reply->id}"))
            ->line('با تشکر از همراهی شما!');
    }
}
