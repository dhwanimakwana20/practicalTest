<?php

namespace App\Console\Commands;

use App\Mail\SendReminder;
use App\Models\Reminder as ModelsReminder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Reminder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminders = ModelsReminder::with('user')
            ->where('datetime', '<=', Carbon::now()->format('Y-m-d H:i:m'))
            ->where('status',0)
            ->get();
        if ($reminders->count() > 0) {
            foreach ($reminders as $reminder) {
                $reminder['status'] = 1;
                $reminder->save();
                Mail::to($reminder->user->email)->send(new SendReminder($reminder));
            }
        }

        return Command::SUCCESS;
    }
}
