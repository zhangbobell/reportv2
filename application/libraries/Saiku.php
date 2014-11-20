<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Zhao
 * Date: 14-11-19
 * Time: 上午9:02
 */

class Saiku
{

    private static $opt = array(
        //      CURLOPT_CONNECTTIMEOUT => 20,
        CURLOPT_RETURNTRANSFER => true,
        //      CURLOPT_FRESH_CONNECT   => 1,
        //      CURLOPT_TIMEOUT        => 320,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (X11; Linux x86_64; rv:14.0) Gecko/20100101 Firefox/14.0.1',
    );

    function guid()
    {

        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }

    public function exec( $url, $method = 'get', $params = array() )
    {

        $ch = curl_init();
        $opts = self::$opt;

        switch( $method ) {

            case 'get':
                $url.= '?'.http_build_query( $params );
                break;

            case 'post':
                if( count( $params ) > 0 ) {
                    $opts[CURLOPT_POST] = count( $params );
                    $opts[CURLOPT_POSTFIELDS] = http_build_query( $params );
                }
                break;
        }



        $cookie_file = TP_DIR."/saiku/saiku.cookie";

        $opts[CURLOPT_COOKIEJAR] = realpath($cookie_file);
        $opts[CURLOPT_COOKIEFILE] = realpath($cookie_file);
        $opts[CURLOPT_URL] = $url;
        // curl_setopt ($ch, CURLOPT_COOKIEJAR, realpath($cookie_file) );

        curl_setopt_array( $ch, $opts );

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);

        return array( 'response' => $result, 'info' => $info );
    }

    public function login($base, $arr) {
        $r = $this->exec($base.'session/');

        $session = json_decode($r['response'], true);

        if (count($session) === 1)
        {
            $method = 'post';
            $r = $this->exec($base. 'session/', $method, $arr);

            return $r;


            if ($r[ 'info' ][ 'http_code' ] == '200')
            {
                $r = $this->exec($base.'session/');
                $session = json_decode( $r[ 'response' ], true );

                return $session;
            }

        }

        return $session;
    }

    public function fetchRepository($base, $session, $repName) {
        $qstring = $base.$session['username'].'/repository/'.urlencode($repName);

        $r = $this->exec($qstring);
        $res = json_decode($r['response'], true);

        return $res;
    }


    public function get_json_data($saiku_file)
    {
        $base = SAIKU_URL;

        $array = array(
            'username' => SAIKU_USERNAME,
            'password' => SAIKU_PASSWORD
        );


        $session = $this->login($base, $array);

        $res = $this->fetchRepository($base, $session, $saiku_file);

        $xml = simplexml_load_string($res['xml']);
        $attr = $xml->attributes();


        // 自定义MDX，需要先建立一个QueryModel, QueryModel可以复用
        $new_query = $this->guid();
        $new_query = trim($new_query,'{}');
        $qstring = $base.$session['username'].'/query/'.$new_query;
        $r = $this->exec( $qstring, 'post', array(
                'type' => $attr->type,
                'connection' => $attr->connection, //
                'cube' => $attr->cube,
                'catalog' => $attr->catalog,
                'schema' => $attr->schema,
                'formatter' => 'flattened',
                'xml' => $res['xml']
            )
        );

        //利用建立好的QueryModel, 提交MDX并取回结果
        $qstring = $base.$session['username'].'/query/'.$new_query.'/result/flat';
        $mdx = (string)$xml->MDX;

        $r = $this->exec( $qstring, 'post', array('limit' => "0", 'mdx' => $mdx) );
        $results = json_decode( $r[ 'response' ], true);

        return json_encode($results);

    }

    // 获取所有的 saiku 文件
    function getRepositoies()
    {

    }

}
