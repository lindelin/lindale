<?php

namespace App\Console\Commands\Notification;

use App\Events\Project\NoticeEvent;
use App\Notice\Notice;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NoticeSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notice:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send project\'s notice to user';

    /**
     * NoticeSend constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 処理
     */
    public function handle()
    {
        try {
            $notices = Notice::where('start_at', Carbon::today()->toDateString())->get();

            if ($notices->count() > 0) {
                $this->comment(PHP_EOL.'<info>Sending...</info>');

                $bar = $this->output->createProgressBar(count($notices));

                foreach ($notices as $notice) {
                    event(new NoticeEvent($notice));
                    info('Dispatching Events: NoticeEvent', ['notice' => $notice->id]);
                    $bar->advance();
                }
                $bar->finish();

                $this->line(PHP_EOL.'<info>✔</info> successfully sent.'.PHP_EOL);

                exit;
            } else {
                $this->line(PHP_EOL.'<info>✔</info> NO DATA.'.PHP_EOL);
            }

        } catch (\Exception $exception) {
            $this->line($exception);
            $this->line(PHP_EOL.'<error>✘</error> System error. Sending failed!');
            exit;
        }
    }
}
