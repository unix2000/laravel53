<?php
namespace App\Jobs;

use PhpSms;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerifyCode implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Generate 4 digit random code
        $code = str_random(4);

        // Push it to cache storage, expired time: 10 mins
        \Cache::put($this->phone, $code, 10);

        $content = "【XXXX】您的验证码是{$code}";

        $templates = [
            'YunPian' => env('YUNPIAN_TEMPLATE_VERIFYCODE_ID', 'your_temp_id'),
        ];

        $templateData = [
            'code' => $code
        ];

        PhpSms::make()->to($this->phone)
            ->template($templates)
            ->data($templateData)
            ->content($content)
            ->send();
    }
}