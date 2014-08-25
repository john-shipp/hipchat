<?php

class Hipchat
{
    private $auth_token;
    private $v2_auth_token;
    private $target;
    private $v2_target;
    private $resource_id;
    private $query_string;

    public function __construct()
    {
        $this->auth_token = '';
        $this->target = 'https://api.hipchat.com/v1/';
        $this->v2_auth_token = '';
        $this->v2_target = 'https://api.hipchat.com/v2/';
    }

    public function request($resource_id = NULL, $options = array(), $use_v2 = false)
    {
        if ($use_v2) {
            $this->auth_token = $this->v2_auth_token;
            $this->target = $this->v2_target;
        }

        $options['auth_token'] = $this->auth_token;

        $this->query_string = http_build_query($options);

        if ($resource_id) {
            $this->resource_id = $resource_id;
            return $this->_getResponse();
        }
    }

    private function _buildUrl()
    {
        return ($this->target . $this->resource_id . '?' . $this->query_string);
    }

    private function _getResponse()
    {
        return file_get_contents($this->_buildUrl());
    }
}