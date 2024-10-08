<?php

require_once("./assets/php/DbConnection.php");
require_once("./assets/php/models/Slider.php");
require_once("./assets/php/models/About.php");
class HomeService
{

    private $connection;


    function __construct()
    {
        $this->connection = DbConnection::getInstance()->getConnection();
    }







function getSlider(){

$query = "SELECT * FROM slider";

        $result = $this->connection->query($query);
        $data_slider = array();

        if (($result) && ($result->num_rows > 0)) {
            while ($row = $result->fetch_assoc()) {
                $slider = new Slider();
                $slider->setId($row['id']);
                $slider->setTitle($row['title']);
                $slider->setCaption($row['caption']);
                $slider->setDescription($row['description']);
                $slider->setImage($row['image']);
                $data_slider[] = $slider;
            }

            return $data_slider;
        }

        return array();
    }


    public function uploadImage($image)
{
   
        // Verifica se è stata ricevuta un'immagine
        if ($image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "assets/img/home1/";  // Cartella in cui vuoi salvare le immagini
            $fileName = $image['name'];
            $filePath = $uploadDir . $fileName;

            // Sposta il file nella cartella di destinazione
            if (move_uploaded_file($image['tmp_name'], $filePath)) {

                // Restituisci il nome dell'immagine come conferma
                return $fileName;
            } else {
                // Gestisci l'errore di spostamento del file
                throw new Exception('Errore durante il salvataggio dell\'immagine.');
            }
        } else {
            // Gestisci l'errore di caricamento dell'immagine
            throw new Exception('Nessuna immagine ricevuta o errore durante il caricamento.');
        }
   
}


public function uploadImageAbout($image)
{
   
        // Verifica se è stata ricevuta un'immagine
        if ($image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "assets/img/about/";  // Cartella in cui vuoi salvare le immagini
            $fileName = $image['name'];
            $filePath = $uploadDir . $fileName;

            // Sposta il file nella cartella di destinazione
            if (move_uploaded_file($image['tmp_name'], $filePath)) {

                // Restituisci il nome dell'immagine come conferma
                return $fileName;
            } else {
                // Gestisci l'errore di spostamento del file
                throw new Exception('Errore durante il salvataggio dell\'immagine.');
            }
        } else {
            // Gestisci l'errore di caricamento dell'immagine
            throw new Exception('Nessuna immagine ricevuta o errore durante il caricamento.');
        }
   
}


function updateSlider($sliderId, $editedTitle, $editedCaption, $editedDescription, $editedImage2) {
    // Ottieni l'immagine corrente dal database
    $imageQuery = "SELECT image FROM slider WHERE id=$sliderId";
    $result = $this->connection->query($imageQuery);

    if ($result !== false && $result->num_rows > 0) {
        $imageRow = $result->fetch_assoc();
        $imageName = $imageRow['image'];

        // Se l'immagine è cambiata, elimina quella vecchia
        if ($imageName !== $editedImage2) {
            $imagePath = "assets/img/home1/{$imageName}";

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }

    // Aggiorna il record nel database
    $query = "UPDATE slider SET title = ?, caption = ?, description = ?, image = ? WHERE id = ?";
    
    $stmt = $this->connection->prepare($query);
    $stmt->bind_param("ssssi", $editedTitle, $editedCaption, $editedDescription, $editedImage2, $sliderId);
    
    $result = $stmt->execute();
    
    $stmt->close(); // Chiudi lo statement preparato

    if ($result === false) {
        return false;
    }

    return true;
}





function removeFromSlider($sliderId){
    // Ottieni il nome dell'immagine dal database
    $imageQuery = "SELECT image FROM slider WHERE id={$sliderId}";
    $imageResult = $this->connection->query($imageQuery);

    if ($imageResult === false) {
        // Gestisci l'errore se necessario
        return false;
    }

    $imageRow = $imageResult->fetch_assoc();
    $imageName = $imageRow['image'];

    // Specifica il percorso completo dell'immagine
    $imagePath = "assets/img/home1/{$imageName}";

    // Elimina l'immagine dalla cartella
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Elimina il record dal database
    $query = "DELETE FROM slider WHERE id={$sliderId}";
    $result = $this->connection->query($query);

    if ($result === false) {
        // Gestisci l'errore se necessario
        return false;
    }

    return true;
}


function addNewSlider($sliderTitle, $sliderCaption, $sliderDescription, $sliderImage) {
    $query = "INSERT INTO slider (title, caption, description, image) VALUES (?, ?, ?, ?)";
    
    $stmt = $this->connection->prepare($query);
    $stmt->bind_param("ssss", $sliderTitle, $sliderCaption, $sliderDescription, $sliderImage);
    
    $result = $stmt->execute();
    
    $stmt->close(); // Chiudi lo statement preparato

    if ($result === false) {
        return false;
    } else {
        return true;
    }
}


function getAboutUs(){

    $query = "SELECT * FROM about";
    
            $result = $this->connection->query($query);
            $data_about = array();
    
            if (($result) && ($result->num_rows > 0)) {
                while ($row = $result->fetch_assoc()) {
                    $about = new About();
                    $about->setId($row['id']);
                    $about->setSlogan($row['slogan']);
                    $about->setTitle($row['title']);
                    $about->setDescription($row['description']);
                    $about->setMission($row['mission']);
                    $about->setVision($row['vision']);
                    $about->setImage($row['image']);
                    $data_about[] = $about;
                }
    
                return $data_about;
            }
    
            return array();
        }



        function updateAbout($aboutId,$aboutSlogan, $aboutTitle, $aboutDescription, $aboutMission, $aboutVision, $aboutImage) {
            // Ottieni l'immagine corrente dal database
            $imageQuery = "SELECT image FROM about WHERE id=$aboutId";
            $result = $this->connection->query($imageQuery);
        
            if ($result !== false && $result->num_rows > 0) {
                $imageRow = $result->fetch_assoc();
                $imageName = $imageRow['image'];
        
                // Se l'immagine è cambiata, elimina quella vecchia
                if ($imageName !== $aboutImage) {
                    $imagePath = "assets/img/about/{$imageName}";
        
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        
            // Aggiorna il record nel database
            $query = "UPDATE about SET slogan = ?, title = ?, description = ?, mission = ?, vision = ?, image = ? WHERE id = ?";
            
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("ssssssi", $aboutSlogan, $aboutTitle, $aboutDescription, $aboutMission, $aboutVision, $aboutImage, $aboutId);
            
            $result = $stmt->execute();
            
            $stmt->close(); // Chiudi lo statement preparato
        
            if ($result === false) {
                return false;
            }
        
            return true;
        }
        
        
    

}