<?php

namespace App\Listeners;
use App\Events\ClassCanceled;
use App\Jobs\NotifyClassCanceledJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ClassCanceledMail;
use App\Notifications\ClassCanceledNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
class NotifyClassCanceled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceled $event): void
    {
       $members = $event->scheduledClass->members()->get();

       $className = $event->scheduledClass->classType->name;
       $classDateTime = $event->scheduledClass->date_time;

       $details = compact('className','classDateTime');

       //send mail to user

    //    $members->each(function($member) use ($details){
    //        Mail::to($member)->send(new ClassCanceledMail($details));
    //    });

     //send notification mail to user

   // Notification::send($members ,new ClassCanceledNotification($details));

    //send queue job mail to user
    NotifyClassCanceledJob::dispatch($members, $details);
    }
}
