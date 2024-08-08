<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use App\Mail\NewsletterMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Command
{
    protected $signature = 'newsletter:send {content}';
    protected $description = 'Send newsletter to all subscribers';

    public function handle()
    {
        $content = $this->argument('content');
        $subscribers = Subscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsletterMail($content));
        }

        $this->info('Newsletter sent successfully.');
    }
}

