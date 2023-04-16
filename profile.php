<?php
// Je vérifie si le formulaire est soumis comme d'habitude
if($_SERVER['REQUEST_METHOD'] === "POST"){ 
    // Securité en php
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
    $uploadDir = 'public/uploads/';
    // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
    $imageUpload = $uploadDir . basename($_FILES['avatar']['name']);
    // Je récupère l'extension du fichier
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // Les extensions autorisées
    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    // Le poids max géré par PHP par défaut est de 1M
    $maxFileSize = 1000000;
    
    // Je sécurise et effectue mes tests
    $errors =[];
    /****** Si l'extension est autorisée *************/
    if( (!in_array($extension, $authorizedExtensions))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Gif ou Webp ou Png !';
    }

    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins d' 1M !";
    }

    if(!isset($_POST['firstname']) || trim($_POST['firstname']) === '') 
            $errors[] = "Le prénom est obligatoire";
    if(!isset($_POST['lastname']) || trim($_POST['lastname']) === '') 
            $errors[] = "Le nom est obligatoire";
    if(!isset($_POST['age']) || trim($_POST['age']) === '') 
            $errors[] = "L'âge est obligatoire";   
     $newNameFile = uniqid('', true).'.'. $extension;
     //$fileDestination = $uploadDir .$newNameFile;   
     $fileDestination = $uploadDir.$newNameFile;   


       

    /****** Si je n'ai pas d"erreur alors j'upload *************/
   /**
        TON SCRIPT D'UPLOAD
 */
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $age =htmlspecialchars($_POST['age']);
        move_uploaded_file($_FILES['avatar']['tmp_name'],  $fileDestination);
}
?>        
           
        <?php // Affichage des éventuelles erreurs 
            if (count($errors) > 0) { ?>
                <div class="border border-danger rounded p-3 m-5 bg-danger">
                     <ul>
                         <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                     </ul>
                </div>
                <?php } else { ?>  
                         
                 <div>
                     Merci <?php echo  $firstname .' '; ?>de mettre votre profil à jour .
                 <br />

            
                 Vos données saisies :
                 votre nom :<?php echo $lastname  ;?> 
                 votre âge : <?php echo $age ; ?>  

                 Votre photo : <img src='\public\uploads\<?php echo $newNameFile?>' alt='Homer Simpson'>
           
                </div>
                <?php }; ?> 
            