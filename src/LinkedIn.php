<?php

namespace JeroenDesloovere\LinkedIn;

/**
 * LinkedIn API
 *
 * This LinkedIn API PHP Wrapper class connects to the LinkedIn API.
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class LinkedIn
{
    // API url
    const API_URL = 'https://api.linkedin.com/';

    // API version
    const API_VERSION = 'v1';

    // current version
    const VERSION = '0.0.1';

    /**
     * App key
     *
     * @var string
     */
    private $appKey;

    /**
     * App secret
     *
     * @var string
     */
    private $appSecret;

    /**
     * OAuth acces token
     *
     * @var string
     */
    private $oAuthAccessToken;

    /**
     * Construct
     *
     * @param string $appKey
     * @param string $appSecret
     * @param string $oAuthAccessToken
     * @param string $tokenSecret
     */
    public function __construct($appKey, $appSecret, $oAuthAccessToken)
    {
        $this->appKey = (string) $appKey;
        $this->appSecret = (string) $appSecret;
        $this->oAuthAccessToken = (string) $oAuthAccessToken;
    }

    /**
     * Do call
     *
     * @param string $url The URL to call.
     * @param array[optional] $data The data to pass.
     */
    protected function doCall($url, $data = null)
    {
        // define unsigned url
        $unsignedUrl = self::API_URL . self::API_VERSION . '/' . $url;

        // define oauth2 access token
        $data['oauth2_access_token'] = $this->oAuthAccessToken;

        // if data is set, add to url
        if(!empty($data)) $unsignedUrl .= '?' . http_build_query($data);

        // get the signed URL
        $signedUrl = $unsignedUrl;

        // send LinkedIn API Call
        $curl = curl_init($signedUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_VERBOSE, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=UTF-8'
        ));

        // LinkedIn response
        $result = curl_exec($curl); 

        // close connection
        curl_close($curl);

        // handle LinkedIn response data
        return(json_decode($result));
    }

    /**
     * Get profile
     */
    public function getProfile()
    {
        return $this->doCall('people/~');
    }
}

/**
 * LinkedIn API Exception
 *
 * @author Jeroen Desloovere <info@jeroendesloovere.be>
 */
class LinkedInException extends \Exception {}
