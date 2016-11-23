<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
// use App\Http\Requests;

class RedisController extends Controller
{
	public function index(){
		//redis命令
		//Strings 字符串
		//SET GET MSET MGET APPEND INCR INCRBY DECRBY

		//Hashes 哈希
		//HSET HGET HMSET HMGET HDEL HEXISTS

		//Lists 列表
		//LSET LTRIM LPOP LPUSH LRANGE LREM LINDEX LLEN LINSERT

		//Sets集合
		//SADD SDIFF SMOVE SPOP SUNION SREM

		//sorted sets有序集合
		//ZADD ZCOUNT ZRANGE ZSCAN ZINCRBY ZRANK ZRANK

		//Pub/Sub 发布/订阅
		//PUBLISH PUBSUB PSUBSCRIBE SUBCRIBE UNSUBSCRIBE PUNSUBSCRIBE
		
		//Transaction事务
		//DISCARD EXEC MULTI UNWATCH WATCH

		//Script脚本
		//EVAL EVALSHA SCRIPT EXISTS(FLUSH | KILL | LOAD)

		// Connection连接
		//AUTH ECHO PING QUIT SELECT

		//Server服务器
		// CLIENT SETNAME|GETNAME|KILL|LIST  CONFIG SET|GET  FLUSHALL FLUSHDB INFO MONITOR 
		// SYNC TIME SAVE LASTSAVE PSYNC SHUTDOWN SLAVEOF SLOWLOG 
		// BGREWRITEAOF BGSAVE DBSIZE DEBUG OBJECT|SEGFAULT

		//composer require predis/predis
		// dump(new Redis());
		// $key = "redis_model:a:1";
		// $data = Redis::get($key);
		// dump($data);
		// $conn = Redis::connection();
		// dump($conn);

		// Redis::set('username','liner.xie');
		// dump(Redis::get('username'));
		// dump(Redis::get('user:user_id:1:passwd'));
		// $data = Redis::lrange('redis_model', 1, 20);
		$data = Redis::command('hgetall',['redis_model:a:1']);
		dump($data);
	}
}
