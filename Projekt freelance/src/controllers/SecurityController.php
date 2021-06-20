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

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== md5($password)) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
        header("Location: {$url}/main");

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
        $user = new User($email, md5($password), $username, $branch);
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

}