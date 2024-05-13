<?php
namespace app\controllers;

#[\app\filters\Login]  //making sure the user is logging in more efficiently than copy pasting over and over
class Publication extends \app\core\Controller
{
    #[\app\filters\HasProfile]

    public function viewPublication($publication_id)
    {
        $p = new \app\models\Publication();

        $specificPublication = $p->getById($publication_id);

        $this->view('Publication/viewPublication', ['publication' => $specificPublication]);
    }


    public function publications()
    {
        $p = new \app\models\Publication();

        $allPublications = $p->getAllPublications();

        $this->view('Home/home', $allPublications);
    }


    public function index()
    {
        // Retrieve the user id from the session
        $profile_id = $_SESSION['profile_id'];

        // Create a new Publication instance
        $publication = new \app\models\Publication();

        // Get the publications for the user
        $publicationTitles = $publication->getTitlesForUser($profile_id);

        // Check if publicationTitles is an array and not empty
        if (!empty ($publicationTitles) && is_array($publicationTitles)) {
            // Pass publication titles to the view
            $this->view('Publication/publications', ['publicationTitles' => $publicationTitles]);
        } else {
            // Handle case where no publications are found
            echo "No publications found for the user.";
        }


    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve profile_id from session
            $profile_id = $_SESSION['user_id'];

            // Check if profile_id is set
            if ($profile_id) {
                // Create a new publication object
                $publication = new \app\models\Publication();

                // Populate the publication object
                $publication->profile_id = $profile_id;
                $publication->publication_title = $_POST['publication_title'];
                $publication->publication_text = $_POST['publication_text'];
                $publication->publication_status = $_POST['visibility'];

                // Insert the publication
                $publication->insert();

                // Redirect
                header('location:/Publication/index');  // Adjust the redirection to the appropriate page
            } else {
                // Handle case where profile_id is not set
                echo "Profile ID not found.";
            }
        } else {
            $this->view('Publication/create');
        }
    }

    function edit()
    {
        $publication_id = $_GET['publication_id'];
        // Get that record
        $publication = \app\models\Publication::getById2($publication_id);
        // Get the updated information from the user...
        $this->view('Publication/edit', ['publication' => $publication]);
    }

    public function update($publication_id)
    {
        $p = new \app\models\Publication();
        $publication = $p->getById($publication_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication->publication_title = $_POST['publication_title'];
            $publication->publication_text = $_POST['publication_text'];
            $publication->publication_status = $_POST['visibility'];

            // Update the publication in the database
            $publication->update();

            // Redirect to view the updated publication
            header('Location: /Publication/viewPublication/' . $publication_id);
            exit;
        } else {
            // If not a POST request, display the edit form
            $this->view('Publication/edit', ['publication' => $publication]);
        }
    }

    //delete
    public function delete($publication_id)
    {
        
            // Delete related comments first
            $c = new \app\models\PublicationComment();
            
        
            // Delete the publication
            $p = new \app\models\Publication();
            $publication = $p->getById($publication_id);
            
        
            // Redirect or handle the response accordingly
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $publication->delete();
            $c->deleteByPublicationId($publication_id);

            header('location:/Profile/index');
        } else {
            $this->view('Publication/delete', ['publication' => $publication]);
        }
    }

    
}

