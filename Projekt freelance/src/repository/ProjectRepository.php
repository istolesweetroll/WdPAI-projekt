<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../models/Client.php';
class ProjectRepository extends Repository
{
    public function doesClientExist(Client $client): ?Client
    {
        $clientname = $client -> getClientname();
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.clients WHERE clientname = :clientname
        ');
        $stmt->bindParam(':clientname', $clientname, PDO::PARAM_STR);
        $stmt->execute();

        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($client== false) {
            return false;
        }
        else return true;
    }
    public function addClient(Client $client)
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO clients (clientname, clientemail)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $client->getClientname(),
            $client->getClientemail(),
        ]);}
    public function addProject(Project $project, Client $client)
    {
        $date = new DateTime();
        $email = $client->getClientemail();

        $stmt = $this->database->connect()->prepare('
            SELECT public.clients.clients_id FROM public.clients WHERE clientemail = :clientemail1

        ');
        $stmt->bindParam(':clientemail1', $email, PDO::PARAM_STR);
        $stmt->execute();

        $client_id= $stmt->fetch(PDO::FETCH_ASSOC);
        $client_id = (int) $client_id['clients_id'];



        $stmt = $this->database->connect()->prepare('
            SELECT public.users.users_id FROM public.users WHERE username = :username

        ');
        $stmt->bindParam(':username',$_COOKIE['username'], PDO::PARAM_STR);
        $stmt->execute();

        $user_id= $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = (int) $user_id['users_id'];



        $stmt = $this->database->connect()->prepare('

            INSERT INTO projects (projecttitle, projectdescription, projectstartdate, projectdeadline, client_id, user_id)
            VALUES (?, ?, ?, ?, ?, ?)
        ');
        $stmt->execute([
            $project->getProjecttitle(),
            $project->getProjectdescription(),
            $project->getProjectstartdate(),
            $project->getProjectdeadline(),
            $client_id,
            $user_id


        ]);

    }
    public function getAllUserProjects(string $username)
    {

        $stmt = $this->database->connect()->prepare('
SELECT users.users_id
FROM public.users
WHERE users.username = :username;

        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user_id= $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = (int) $user_id['users_id'];

        $stmt = $this->database->connect()->prepare('
SELECT projecttitle
FROM public.projects
WHERE projects.user_id = :user_id;
        ');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $userprojects= $stmt->fetch(PDO::FETCH_ASSOC);
        return $userprojects;

    }
    public function addEntry(Entry $entry)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO  entries(project_id, entry_date, entry_length, entry_description)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $entry->getProjectId(),
            $entry->getEntryDate(),
            $entry->getEntryLength(),
            $entry->getEntryDescription()
        ]);}

    public function getProjectId(string $projectName): int {

        $stmt = $this->database->connect()->prepare('
SELECT projects_id 
FROM projects
WHERE projecttitle = :projectTitle;

        ');
        $stmt->bindParam(':projectTitle', $projectName, PDO::PARAM_STR);
        $stmt->execute();

        $project_id= $stmt->fetch(PDO::FETCH_ASSOC);
        $project_id = (int) $project_id['projects_id'];
        return $project_id;

    }
}