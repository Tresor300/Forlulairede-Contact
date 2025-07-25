<!DOCTYPE HTML>
<HTML LANG="fr">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE>Page de traitement</TITLE>
    </HEAD>
    <BODY>
        <P>Dans le formulaire précédent, vous avez fourni
        information suivants: </P>
        <?php  
                echo 'Nom:'. $_POST["nom"].'<BR>';
                echo 'Prenom:'. $_POST["prenom"].'<BR>';
                echo 'email:' . $_POST["email"]. '<BR>';
                echo 'Date de naissance:'. $_POST["date"].'<BR>';
            if(isset ($_POST['sex']))
            {
                 echo 'Genre:' .$_POST['sex'] .'<BR>';
            }
            else
            {
                 echo 'genre non selectionné. <BR>';
            }

            echo 'Numéro de téléphone:'. $_POST["numero"].'<BR>';
            echo 'Motivation:' .$_POST["motivation"].'<BR>';
            echo 'Pièce identité:' .$_POST["filename"].'<BR>';
            var_dump($_FILES);
            //on vérifie si unfichier à été envoyer
            if(isset($_FILES["doc"]) && $_FILES["doc"]["error"] === 0)
            {
                //on a recu l'image
                //on procède aux vérifications
                //on vérifie toujours l'extension et le type Mime
                $allowed = ("pdf" == "application/pdf");

                $filename = $_FILES["doc"]["name"];
                $filetype = $_FILES["doc"]["type"];
                $filesize = $_FILES["doc"]["size"];

                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                //on verifie l'absence de l'extension dans les  cles de $allowed ou l'absence du type Mime dans les valeurs
                
                    if(is_array($allowed) && array_key_exists($extension, $allowed) && in_array($filetype, $allowed[$extension]))
                    {
                        //ici soit l'extension soit le type est incorrect
                    }
                    else
                    {
                        die("Erreur fomat de fichier incorrect");
                    }

                    if($filesize >1024 *1024 )
                    {
                        die("Fichier trop volumineux");
                    }
            }
                
             /* if($moveIsOK)
            {
                $message = "Le fichier à été uploadé dans ". $cheminEtNomDefinitif;
            }
            else
            {
                $message = "suite à une erreur , le fichier n 'a pas été uploadé";
            }*/

         ?>   


    </BODY>
</HTML>
        