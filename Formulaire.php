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

            $nomOrigine = $_FILES["doc"]["name"];
            $elementChemin = pathinfo($nomOrigine);
            $extensionFichier = $elementChemin["extension"];
            $extensionsAutorisees = array("pdf");
            if(!(in_array($extensionFichier, $extensionsAutorisees)))
            {
                echo "Le fichier n'a pas l'extension attendue";
            }
            else
            {
                //copie dans le repertoire du script avec un nom
                //incluant l'heure a la seconde pres
                $nomUtilisateur = $_POST["filename"];
                $repertoireDestination = dirname(__FILE__)."/upload/";
                $nomDestination = $nomUtilisateur."fichier_du_".date("YmdHis").".".$extensionFichier;

                if(move_uploaded_file($_FILES["doc"]["tmp_name"], $repertoireDestination.$nomDestination))
                {
                    echo "Le fichier temporaire".$_FILES["doc"]["tmp_name"]." a été déplacé vers ".$repertoireDestination.$nomDestination;
                }
                else
                {
                    echo "Le fichier n'apas été uploadé (trop gros ?) ou"."Le déplacement du fichier temporaire a échoué"." vérifiez l'existence du repertoire ".$repertoireDestination;
                }
            }
            
            
        ?>   


    </BODY>
</HTML>
        