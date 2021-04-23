<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function main()
    {
        $this->render('main');
    }
    public function signup()
    {
        $this->render('signup');
    }
    public function accountsettings()
    {
        $this->render('account settings');
    }
    public function deleteproject()
    {
        $this->render('delete project');
    }
    public function newproject()
    {
        $this->render('new project');
    }
    public function newentry()
    {
        $this->render('new entry');
    }
    public function projectentries()
    {
        $this->render('project entries');
    }
    public function addentrymanually()
    {
        $this->render('add entry manually');
    }
    public function forgotpassword1()
    {
        $this->render('forgot password1');
    }
    public function forgotpassword2()
    {
        $this->render('forgot password2');
    }
    public function forgotpassword3()
    {
        $this->render('forgot password3');
    }
    public function completeproject()
    {
        $this->render('complete project');
    }
    public function editproject()
    {
        $this->render('edit project');
    }
    public function seeprojectinfo()
    {
        $this->render('see project info');
    }
    public function starttimer()
    {
        $this->render('start timer');
    }
    public function timer()
    {
        $this->render('timer');
    }
}