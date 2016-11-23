<?php
namespace App\Api\Controllers;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use JWTAuth;
use App\User;
use Cache;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends BaseController {
	//用户注册模板
	public function register()
  {
    // 验证规则
    $rules = [
      'name' => ['required'],
      'phone' => ['required', 'min:11', 'max:11', 'unique:users'],
      'password' => ['required', 'min:6'],
      'key' => ['required', 'min:6']
    ];
    $payload = app('request')->only('name', 'phone', 'password', 'key');
    $validator = app('validator')->make($payload, $rules);
    // 手机验证码验证
    if (Cache::has($payload['phone'])) {
      $key = Cache::get($payload['phone']);
      if ($key != $payload['key']) {
          return $this->response->array(['error' => 'Phone Key error']);
      }
    } else {
      return $this->response->array(['error' => 'Phone Key error']);
    }
    // 验证格式
    if ($validator->fails()) {
      return $this->response->array(['error' => $validator->errors()]);
    }
    // 创建用户
    $res = User::create([
      'name' => $payload['name'],
      'phone' => $payload['phone'],
      'password' => bcrypt($payload['password']),
    ]);
    // 创建用户成功
    if ($res) {
      return $this->response->array(['success' => 'Create User Success']);
    } else {
      return $this->response->array(['error' => 'Create User Error']);
    }
  }
  /**
   * 获取用户手机验证码
   */
  public function getRandKey()
  {
    // 获取手机号码
    $payload = app('request')->only('phone');
    $phone = $payload['phone'];
    if(empty($phone)) return $this->response->array(['error' => 'Send Sms Error']);
    // 获取验证码
    $randNum = $this->__randStr(6, 'NUMBER');
    // 验证码存入缓存 1 分钟
    $expiresAt = 2;
    Cache::put($phone, $randNum, $expiresAt);
    // 短信内容
    $smsTxt = '验证码为：' . $randNum . '，请在 60 秒内使用！';
    // 发送验证码短信
    $res = $this->_sendSms($phone, $smsTxt);
    // 发送结果
    if ($res) {
        return $this->response->array(['success' => 'Send Sms Success']);
    } else {
        return $this->response->array(['error' => 'Send Sms Error']);
    }
  }
  /**
   * 重置用户密码，并发送随机密码到短信
   */
  public function getRandPassword()
  {
    // 获取手机号码
    $payload = app('request')->only('phone');
    $phone = $payload['phone'];
    if(empty($phone)) return $this->response->array(['error' => 'Send Sms Error']);
    // 获取密码
    $randTxt = $this->__randStr();
    // 更新用户密码
    $user = User::where('phone', $phone)->first();
    $user->password = bcrypt($randTxt);
    $user->save();
    // 短信内容
    $smsTxt = '随机密码为：' . $randTxt . '，登录后请及时更改密码！';
    // 发送验证码短信

    //短信平台发送函数
    // $res = $this->_sendSms($phone, $smsTxt);
    // 发送结果
    // if ($res) {
    //     return $this->response->array(['success' => 'Send Sms Success']);
    // } else {
    //     return $this->response->array(['error' => 'Send Sms Error']);
    // }
  }

	//登陆获取token
	public function token(Request $request)
  {
    // 另一个jwt扩展lcobucci/jwt未测试

    // 貌似JWTAuth扩展使用用户名和jwt secret加密得到token
    // JWTAuth::toUser($token)解密获得user对象 /test/de-token
    // users表默认生成的remember_token字段暂未发现作用

    // grab credentials from the request
    // $credentials = $request->only('phone', 'password');
    $credentials = $request->only('email', 'password');
    try {
      // attempt to verify the credentials and create a token for the user
      if (!$token = JWTAuth::attempt($credentials)) {
        // return response()->json(['error' => 'invalid_credentials'], 401);
        return $this->response->array(['error' => 'invalid_credentials']);
      }
    } catch (JWTException $e) {
      // something went wrong whilst attempting to encode the token
      return $this->response->array(['error' => 'could_not_create_token']);
    }
    // all good so return the token
    return $this->response->array(compact('token'));
  }

  //刷新token
  public function upToken()
  {
    $token = JWTAuth::refresh();
    return $this->response->array(compact('token'));
  }

  //6位随机数函数
  private function __randStr($len = 6, $format = 'ALL')
  {
    switch ($format) {
      case 'ALL':
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
        break;
      case 'CHAR':
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~';
        break;
      case 'NUMBER':
        $chars = '0123456789';
        break;
      default :
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
        break;
    }
    mt_srand((double)microtime() * 1000000 * getmypid());
    $password = "";
    while (strlen($password) < $len)
      $password .= substr($chars, (mt_rand() % strlen($chars)), 1);
    return $password;
  }
}