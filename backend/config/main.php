<?php
use \yii\web\Request;
$baseUrl = str_replace('/backend/web', '', (new Request)->getBaseUrl());
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'kqxsmb-app-backend',
    'timeZone' => 'Asia/Bangkok', 
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'layout' => 'layoutTable',
    'bootstrap' => ['log'],
    'modules' => [
        //===================
        'userOnline' => [
            'class' => 'backend\modules\userOnline\userOnline',
        ],
        //===================
        'curl' => [
            'class' => 'backend\modules\curl\curl',
        ],
        'xsmb' => [
            'class' => 'backend\modules\xsmb\xsmb',
        ],
        'soicau' => [
            'class' => 'backend\modules\soicau\soicau',
        ],

        'tintuc' => [
            'class' => 'backend\modules\tintuc\tintuc',
        ],
        'categories' => [
            'class' => 'backend\modules\categories\categories',
        ],
        'articles' => [
            'class' => 'backend\modules\articles\articles',
        ],
        'moduleManager' => [
            'class' => 'backend\modules\moduleManager\moduleManager',
        ],

        'userPermissionAdvanced' => [
            'class' => 'backend\modules\userPermissionAdvanced\userPermissionAdvanced',
        ],
        'site' => [
            'class' => 'backend\modules\site\site',
        ],
        'customizeWeb' => [
            'class' => 'backend\modules\customizeWeb\customizeWeb',
        ],
        'users' => [
            'class' => 'backend\modules\users\users',
        ],
        'groupAccount' => [
            'class' => 'backend\modules\groupAccount\groupAccount',
        ],
        'groupAccountDetail' => [
            'class' => 'backend\modules\groupAccountDetail\groupAccountDetail',
        ],
        'groupPermissionAdvanced' => [
            'class' => 'backend\modules\groupPermissionAdvanced\groupPermissionAdvanced',
        ],
        'ketQuaMienBac' => [
            'class' => 'backend\modules\ketQuaMienBac\ketQuaMienBac',
        ],
        'ads' => [
            'class' => 'backend\modules\ads\ads',
        ],
        'tags' => [
            'class' => 'backend\modules\tags\tags',
        ],
        'money' => [
            'class' => 'backend\modules\money\money',
        ],
        'money_vip' => [
            'class' => 'backend\modules\money_vip\money_vip',
        ],

        
        // CHO PHEN FRONTEND KET HOP
        'trangchu' => [
            'class' => 'backend\modules\trangchu\trangchu',
        ],
        'thongtincanhan' => [
            'class' => 'backend\modules\thongtincanhan\thongtincanhan',
        ],
        'hopthu' => [
            'class' => 'backend\modules\hopthu\hopthu',
        ],
        'thongkekqxs' => [
            'class' => 'backend\modules\thongkekqxs\thongkekqxs',
        ],
        'chuky' => [
            'class' => 'backend\modules\chuky\chuky',
        ],
        'chukydacbiet' => [
            'class' => 'backend\modules\chukydacbiet\chukydacbiet',
        ],
        'lotogan' => [
            'class' => 'backend\modules\lotogan\lotogan',
        ],
        'soMo' => [
            'class' => 'backend\modules\soMo\soMo',
        ],
        'kinhNghiem' => [
            'class' => 'backend\modules\kinhNghiem\kinhNghiem',
        ],
        'detailAirticle' => [
            'class' => 'backend\modules\detailAirticle\detailAirticle',
        ],
        'dang-ky' => [
            'class' => 'backend\modules\dangky\dangky',
        ],
        'dang-nhap' => [
            'class' => 'backend\modules\dangnhap\dangnhap',
        ],
        'kqxsmbtructiep' => [
            'class' => 'backend\modules\kqxsmbtructiep\kqxsmbtructiep',
        ],
         'kqxsmb' => [
            'class' => 'backend\modules\kqxsmienbac\kqxsmienbac',
        ],
        'so-ket-qua' => [
            'class' => 'backend\modules\soketqua\soketqua',
        ],
        'quaythu' => [
            'class' => 'backend\modules\quaythu\quaythu',
        ],
        'choiOnline' => [
            'class' => 'backend\modules\choiOnline\choiOnline',
        ],
        'chat' => [
            'class' => 'backend\modules\chat\chat',
        ],
        'thanhvien' => [
            'class' => 'backend\modules\thanhvien\thanhvien',
        ],
        'cauloto' => [
            'class' => 'backend\modules\cauloto\cauloto',
        ],
        'bangchotsocaothu' => [
            'class' => 'backend\modules\bangchotsocaothu\bangchotsocaothu',
        ],
         'bangtopcaothu' => [
            'class' => 'backend\modules\bangtopcaothu\bangtopcaothu',
        ],
        'khuchotso' => [
            'class' => 'backend\modules\khuchotso\khuchotso',
        ],
        'khuChotSoAd' => [
            'class' => 'backend\modules\khuChotSoAd\khuChotSoAd',
        ],
         'napvip' => [
            'class' => 'backend\modules\napvip\napvip',
        ],
        'messenger' => [
            'class' => 'backend\modules\messenger\messenger',
        ],
        
    ],
    'components' => [
        'phoneNumber' => [
                'class' => 'backend\components\PhoneNumber', // extend User component
        ],
        'helper' => [
                'class' => 'common\components\Helper', // extend User component
        ],
        'acl' => [
            'class' => 'backend\components\Acl', // extend User component
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
        ],
         'request'=>[
            'baseUrl'=>$baseUrl,
        ],
        'urlManager' => [
                'baseUrl'=>$baseUrl,
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                // 'suffix' => '.html',
                     'rules' => [
                         ''                                                               => 'trangchu/default/index',
                         
                         '/ket-qua-xo-so-mien-bac'                                        => 'kqxsmb/default/index',
                         '/ket-qua-xo-so-truc-tiep'                                       => 'kqxsmbtructiep/default/index',
                         '/choi-online'                                                   => 'choiOnline/default/index',
                         '/choi-online/lich-su'                                           => 'choiOnline/default/history',
                         '/bang-chot-so-cao-thu'                                          => 'bangchotsocaothu/default/index',
                         '/top-cao-thu-choi-cau'                                          => 'bangtopcaothu/default/index',
                         '/khu-chot-so'                                                   => 'khuchotso/default/index',
                         '/quay-thu-dien-toan'                                            => 'quaythu/default/index',
                         '/so-mo'                                                         => 'soMo/default/index',
                         '/tin-tuc'                                                       => 'tintuc/default/index',
                         '/kinh-nghiem'                                                   => 'kinhNghiem/default/index',
                         '/thong-tin-ca-nhan'                                             => 'thongtincanhan/default/index',  
                         '/thong-tin-ca-nhan/<username:([0-9a-zA-Z\-]+)>'                 => 'thongtincanhan/default/view',  
                         '/hop-thu'                                                       => 'hopthu/default/index',  
                         '/chu-ky'                                                        => 'chuky/default/index',
                         '/chu-ky-dac-biet'                                               => 'chukydacbiet/default/index',
                         '/loto-gan'                                                      => 'lotogan/default/index',
                         '/nap-vip'                                                       => 'napvip/default/index',  
                         
                         '/quantri'                                                       => 'site/default/index',
                         '/tags/<alias:([0-9a-zA-Z\-]+)>'                                 => 'tags/default/index',
                         '/thanh-vien/<username:([a-zA-Z\-]+)>'                           => 'thanhvien/default/index',
                         '/bai-viet/<category:([0-9a-zA-Z\-]+)>/<alias:([0-9a-zA-Z\-]+)>' => 'detailAirticle/default/index',
                         
                         'quantri/<module:\w+>/<action:\w+>'                              => '<module>/default/<action>',
                         '<module:\w+>/<action:\w+>'                                      => '<module>/default/<action>',
                         
                         '<module:\w+><controller:\w+>/<id:\d+>'                          => '<module><controller>/view',
                         '<module:\w+><controller:\w+>/<action:\w+>/<id:\d+>'             => '<module><controller>/<action>',
                         '<module:\w+><controller:\w+>/<action:\w+>'                      => '<module><controller>/<action>',
                         
                         '<controller:\w+>/<id:\d+>'                                      => '<controller>/view',
                         '<controller:\w+>/<action:\w+>/<id:\d+>'                         => '<controller>/<action>',
                         '<controller:\w+>/<action:\w+>'                                  => '<controller>/<action>',
                ],
        ],
        
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //     ],
        // ],
        
    ],
    'params' => $params,
];
