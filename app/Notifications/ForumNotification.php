<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ForumNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type,$sender_id,$forum,$course_id)
    {
        $this->type=$type;
        $this->sender_id=$sender_id;
        $this->forum=$forum;
        $this->course_id=$course_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       if($this->type=='reply')
       {
            return (new MailMessage)
            ->subject('Reply to Your Question')
            ->line('There is a reply to your question in Maisha Homecare Hub.')
            ->line('Please login to your user account to view the reply')
            ->action('Login ', url('/login'))
            ->line('Thank you for choosing Maisha Homecare!');
       }
       else if($this->type=='forum'){
        return (new MailMessage)
        ->subject('New Question on Your Courses')
        ->line('There new question related to one of your courses:')
        ->line(' ')
        ->line('  '.$this->forum->description)
        ->line(' ')
        ->line('Please login to your instructor account to view the question')
        ->action('Login ', url('/instructor'))
        ->line('Thank you for choosing Maisha Homecare!');
       }
       
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type'=>$this->type,
            'sender_id'=>$this->sender_id,
            'forum_id'=>$this->forum->id,
            'course_id'=>$this->course_id
        ];
    }
}
