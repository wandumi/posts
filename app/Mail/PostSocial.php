<?php

namespace App\Mail; 
use App\Post;
use Jorenvh\Share\Share;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostSocial extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $share;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        $postTitle = "This is the post";
        return $this->from('post@post.com', 'Admin')
               ->subject($this->post->title)
               ->view('emails.postemail'); 
    }
}
