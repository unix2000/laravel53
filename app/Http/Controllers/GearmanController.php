<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class GearmanController extends Controller 
{
	public function job()
	{
		//job server负责调度
		//debian ubuntu
		//apt-get install gearman-job-server	
	}
	public function worker()
	{
		//php cli mode命令行模式
		$worker = new GearmanWorker();
		$worker->addServer();

		//添加后台处理函数
		$worker->addFunction("send_email", function(GearmanJob $job) {
			$workload = json_decode($job->workload());
			echo "Sending email: " . print_r($workload,1);
			//mail($workload->email, $workload->subject, $workload->body);
		});

		while ($worker->work());
	}
	public function client()
	{
		//前台或命令行模式
		$email = 'liner.xie@qq.com';
		$subject = "liner @ xiexiaolin!";
		$body = 'email content-----!';

		$client = new GearmanClient();
		$client->addServer();
		$result = $client->doBackground("send_email", json_encode(array(
			'email' => $email,
			'subject' => $subject,
			'body' => $body
		)));
	}
}