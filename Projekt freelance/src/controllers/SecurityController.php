<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../models/Entry.php';
require_once __DIR__ .'/../models/Project.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/ProjectRepository.php';

class SecurityController extends AppController
{
    public function login()
    {

        $userRepository = new UserRepository();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $userRepository->getUser($username);
        $url = "http://$_SERVER[HTTP_HOST]";
        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== md5($password)) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        if($user->getIsAdmin() == true){
            header("Location: {$url}/admin");

        }
        $url = "http://$_SERVER[HTTP_HOST]";
        setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day

       if($user -> getIsAdmin() == false) {
           header("Location: {$url}/main");
       }
    }
    public function logOut()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");

    }

    public function register()
    {
        $userRepository = new UserRepository();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['repeatpassword'];

        if ($password !== $confirmedPassword) {
            return $this->render('signup', ['messages' => ['Please provide proper password']]);
        }
        $branch = 'Other';
        $user = new User($email, md5($password), $username, $branch, false);
        $userRepository->addUser($user);
        return $this->render('login', ['messages' => ['You\'ve been succesfully registrered!']]);
    }

    public function addnewproject()
    {
        $projectRepository = new ProjectRepository();

        $projecttitle = $_POST['projecttitle'];
        $projectdescription = $_POST['projectdescription'];
        $projectstartdate = date('Y-m-d H:i:s');
        $projectdeadline = $_POST['projectdeadline'];
        $clientname = $_POST['clientname'];
        $clientemail = $_POST['clientemail'];


        $project = new Project($projecttitle, $projectdescription, $projectstartdate, $projectdeadline);
        $client = new Client($clientname, $clientemail);
        $projectRepository->addClient($client);
        $projectRepository->addProject($project, $client);
        return $this->render('main', ['messages' => ['Project created!']]);

    }

    public function saveEntry(){
        $projectRepository = new ProjectRepository();
        $project_id = $projectRepository -> getProjectId($_COOKIE['projectName']);
        $entryDate = date('Y-m-d H:i:s');
        $entryLength= intval($_COOKIE['timeTotal'], 10);
        $entryDescription = $_COOKIE['projectDescription'];

        $entry = new Entry($project_id, $entryDate, $entryLength, $entryDescription);
        $projectRepository->addEntry($entry);
        return $this->render('main', ['messages' => ['Entry added successfully!']]);
    }
    public function deleteProject(){
        $projectRepository = new ProjectRepository();
        $projectTitle = $_POST["project"];
        $projectRepository->deleteProject($projectTitle);
        return $this->render('main', ['messages' => ['Project deleted successfully!']]);

    }
    public function addEntryManually(){
        $projectRepository = new ProjectRepository();
        $project_id = $projectRepository -> getProjectId($_POST['project']);
        $entryDate = date('Y-m-d', $_POST['entry-time']);
        $time = explode(':', $_POST['appt']);
        $entryLength = (int)(((int)$time[0] . '.' . $time[1])*60);
        $entryDescription = $_POST['entry-description'];
        $entry= new Entry($project_id, $entryDate,  $entryLength, $entryDescription);
        $projectRepository->addEntry($entry);
        return $this->render('main', ['messages' => ['Entry added successfully!']]);

    }
    public function editProject(){
        $projectRepository = new ProjectRepository();
        $project_id = $projectRepository -> getProjectId($_POST['project']);
        setcookie("project_id",$project_id);
        return $this->render('edit project2', ['messages' => []]);

    }
    public function saveEditChanges(){
        $projectRepository = new ProjectRepository();
        $project_id = $projectRepository -> getProjectId($_POST['project']);
        setcookie("project_id",$project_id);
        return $this->render('edit project2', ['messages' => []]);

    }
}