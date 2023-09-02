<?php

namespace App\Http\Request;

use App\Http\Request\Request;
use Database\DB;

trait ValidatesRequests
{
    public function validate(Request $request, array $rules, array $messages = [])
    {
        $requiredMessages = [];
        $isValidMessages = [];
        $arr = [];
        $this->oldValue($request);
        if ($request->method() === "POST") {
            foreach ($rules  as $key => $rule) {
                if (is_array($rule)) {
                    if (!in_array($key , array_keys($request->all()))) {
-                        $requiredMessages[$key]= "required";
                        $this->error($request, $requiredMessages);
                    } else {
                        if ($request->get($key) === " " && in_array("required", $rule)) {
                            $requiredMessages[$key]= "required";
                            $this->error($request, $requiredMessages);
                        } else if (in_array("number", $rule) && !is_numeric($request->get($key))) {
                            $requiredMessages[$key] = "number";
                            $this->error($request, $requiredMessages);
                        } else if (in_array("string", $rule) && !is_string($request->get($key))) {
                            $requiredMessages[$key] = "string";
                            $this->error($request, $requiredMessages);
                        } else if(in_array('email', $rule) && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request->get($key))) {
                            $requiredMessages[$key] = "email";
                            $this->error($request, $requiredMessages);
                        } else if(substr_count(implode(" ", $rule), "exits") > 0){
                            $tableName = explode(":", strstr(implode($rule), "exits"))[1];
                            $db = new DB();
                            $model = $db->table($tableName, $key, $request->get($key));
                            if ($model>0) {
                                $isValidMessages[$key] = "The selected $key is invalid";
                                $this->error($request, [], $isValidMessages);
                            } else {
                                $this->destroySessionMessage($key);
                                continue;
                            }
                        } else if(substr_count(implode(" ", $rule), "max") > 0){
                            if (strlen($request->get($key)) > (int)explode(":", strstr(implode($rule), "max"))[1]) {
                                if ($key === "password") {
                                    $requiredMessages[$key] = sprintf("password must %s characters", strstr(implode($rule), "max"));
                                } else {
                                    $requiredMessages[$key] = strstr(implode($rule), "max");
                                }
                            } else {
                                $this->destroySessionMessage($key);
                                continue;
                            }
                        } else if(substr_count(implode(" ", $rule), "min") > 0){
                            if (strlen($request->get($key)) < (int)explode(":", strstr(implode($rule), "min"))[1]) {
                                if ($key === "password") {
                                    $requiredMessages[$key] = sprintf("password must %s characters", strstr(implode($rule), "min"));
                                } else {
                                    $requiredMessages[$key] = strstr(implode($rule), "min");
                                }
                                $this->error($request, $requiredMessages);
                            } else {
                                $this->destroySessionMessage($key);
                                continue;
                            }
                        } else if($key === "confirmed_password" && $request->get("password") !== $request->get("confirmed_password")){
                            $requiredMessages["password"] = "password_confirmed do not match";
                            $this->error($request, $requiredMessages);
                        } else {
                            $this->destroySessionMessage($key);
                        }
                    }
                } else{
                    if (!in_array($key , array_keys($request->all()))) {
                        $requiredMessages[$key]= "required";
                    } else {
                        if (empty($request->get($key)) && in_array("required", explode("|", $rule))) {
                            print_r($key);die;
                            $requiredMessages[$key]= "required";
                        } else if (in_array("number", $rule) && !is_numeric($request->get($key))) {
                            $requiredMessages[$key] = "number";
                            $this->error($request, $requiredMessages);
                        } else if (in_array("string", $rule) && !is_string($request->get($key))) {
                            $requiredMessages[$key] = "string";
                            $this->error($request, $requiredMessages);
                        } else if(in_array('email', $rule) && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request->get($key))) {
                            $requiredMessages[$key] = "email";
                            $this->error($request, $requiredMessages);
                        } else if($key === "password" && strlen($request->get("password")) <= 6){
                            $requiredMessages["password"] = "password must be at least six characters";
                            $this->error($request, $requiredMessages);
                        }else if($key === "confirmed_password" && $request->get("password") !== $request->get("confirmed_password")){
                            $requiredMessages["password"] = "password_confirmed do not match";
                            $this->error($request, $requiredMessages);
                        }else {
                            $this->destroySessionMessage($key);
                        }
                    }
                }

            }

        }
    }

    public function error(Request $request, $requiredMessages = [], $isValidMessages = [])
    {
        if (!empty($isValidMessages)) {
            foreach ($isValidMessages as $key => $isValidMessage)
            {
                $_SESSION["error"][$key] = $isValidMessage;
            }
        }

        if (!empty($requiredMessages)) {
            foreach ($requiredMessages as $key => $requiredMessage)
            {
                $_SESSION["error"][$key] = sprintf("%s is %s",$key, $requiredMessage);
            }
        }

        return $request->referer();
    }

    public function destroySessionMessage($key)
    {
        unset($_SESSION["error"][$key]);
    }

    public function oldValue(Request $request)
    {
        foreach ($request->all() as $key => $attribute) {
            $_SESSION["old"][$key] = trim($attribute);
        }
    }

}